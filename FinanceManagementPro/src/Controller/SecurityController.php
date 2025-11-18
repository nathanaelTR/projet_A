<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use OTPHP\TOTP;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/2fa', name: '2fa_login')]
    public function twoFactor(AuthenticationUtils $authenticationUtils, EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $lastUsername = $authenticationUtils->getLastUsername();

        $showQr = false;
        $qrCodeDataUri = null;

        if ($user) {
            $secret = $user->getGoogleAuthenticatorSecret();
            $totp = TOTP::create($secret);
            $totp->setLabel($user->getEmail());
            $totp->setIssuer('FMP');
            // Afficher le QR code seulement si ce n’est jamais fait
            if (!$user->isQrShown()) {
                $qrCode = new QrCode($totp->getProvisioningUri(), size: 200);
                $writer = new PngWriter();
                $result = $writer->write($qrCode);
                $qrCodeDataUri = $result->getDataUri();

                $showQr = true;
                // Mettre à jour la BDD pour ne plus montrer le QR code
                $user->setQrShown(true);
                $em->flush();
            }
        }

        return $this->render('security/login.html.twig', [
            'show_2fa' => true,
            'show_qr' => $showQr,
            'qr_code' => $qrCodeDataUri,
            'last_username' => $lastUsername,
        ]);
    }

    #[Route('/2fa/check', name: '2fa_login_check')]
    public function check(): Response
    {
        throw new \LogicException('This code should never be reached!');
    }
}
