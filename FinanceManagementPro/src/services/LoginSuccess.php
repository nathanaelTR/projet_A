<?php

namespace App\services;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccess implements AuthenticationSuccessHandlerInterface
{
    public function __construct(private RouterInterface $router) {}

    public function onAuthenticationSuccess($request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();

        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return new RedirectResponse($this->router->generate('app_dashboard_admin_stats'));
        }

        if (in_array('ROLE_GERANT', $user->getRoles())) {
            return new RedirectResponse($this->router->generate('app_dashboard_gerant_dashboard'));
        }

        if (in_array('ROLE_COLLABORATEUR', $user->getRoles())) {
            return new RedirectResponse($this->router->generate('app_dashboard_collaborateur_dashboard'));
        }

        if (in_array('ROLE_COMPTABLE', $user->getRoles())) {
            return new RedirectResponse($this->router->generate('app_dashboard_comptable_entreprises'));
        }

        return new RedirectResponse($this->router->generate('2fa_login'));
    }
}
