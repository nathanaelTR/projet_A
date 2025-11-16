<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dashboard/entreprises', name: 'app_dashboard_admin_entreprises')]
    public function adminEntreprises(): Response
    {
        return $this->render('dashboard/admin/entreprises.html.twig', [
            'role' => 'ROLE_ADMIN',
        ]);
    }
    
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dashboard/audit', name: 'app_dashboard_admin_audit')]
    public function adminAudit(): Response
    {
        return $this->render('dashboard/admin/audit.html.twig', [
            'role' => 'ROLE_ADMIN',
        ]);
    }
    
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dashboard/stats', name: 'app_dashboard_admin_stats')]
    public function adminStats(): Response
    {
        return $this->render('dashboard/admin/statistiques.html.twig', [
            'role' => 'ROLE_ADMIN',
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dashboard/parametres', name: 'app_dashboard_admin_param')]
    public function adminParam(): Response
    {
        return $this->render('dashboard/admin/parametres.html.twig', [
            'role' => 'ROLE_ADMIN',
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dashboard/config', name: 'app_dashboard_admin_config')]
    public function adminConfig(): Response
    {
        return $this->render('dashboard/admin/config.html.twig', [
            'role' => 'ROLE_ADMIN',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/dashboard', name: 'app_dashboard_gerant_dashboard')]
    public function gerantDashboard(): Response
    {
        return $this->render('dashboard/gerant/dashboard.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/transactions', name: 'app_dashboard_gerant_transactions')]
    public function gerantTransactions(): Response
    {
        return $this->render('dashboard/gerant/transactions.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/facturations', name: 'app_dashboard_gerant_facturations')]
    public function gerantFacturations(): Response
    {
        return $this->render('dashboard/gerant/facturations.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/devis', name: 'app_dashboard_gerant_devis')]
    public function gerantDevis(): Response
    {
        return $this->render('dashboard/gerant/devis.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/achats', name: 'app_dashboard_gerant_achats')]
    public function gerantAchats(): Response
    {
        return $this->render('dashboard/gerant/achats.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/ventes', name: 'app_dashboard_gerant_ventes')]
    public function gerantVentes(): Response
    {
        return $this->render('dashboard/gerant/ventes.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/parametres', name: 'app_dashboard_gerant_parametres')]
    public function gerantParametres(): Response
    {
        return $this->render('dashboard/gerant/parametres.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_GERANT')]
    #[Route('/dashboard/g/analyse', name: 'app_dashboard_gerant_analyse')]
    public function gerantAnalyse(): Response
    {
        return $this->render('dashboard/gerant/analyse.html.twig', [
            'role' => 'ROLE_GERANT',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/dashboard', name: 'app_dashboard_collaborateur_dashboard')]
    public function collaborateurDashboard(): Response
    {
        return $this->render('dashboard/collaborateur/dashboard.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/transactions', name: 'app_dashboard_collaborateur_transactions')]
    public function collaborateurTransactions(): Response
    {
        return $this->render('dashboard/collaborateur/transactions.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/facturations', name: 'app_dashboard_collaborateur_facturations')]
    public function collaborateurFacturations(): Response
    {
        return $this->render('dashboard/collaborateur/facturations.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/devis', name: 'app_dashboard_collaborateur_devis')]
    public function collaborateurDevis(): Response
    {
        return $this->render('dashboard/collaborateur/devis.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/achats', name: 'app_dashboard_collaborateur_achats')]
    public function collaborateurAchats(): Response
    {
        return $this->render('dashboard/collaborateur/achats.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/ventes', name: 'app_dashboard_collaborateur_ventes')]
    public function collaborateurVentes(): Response
    {
        return $this->render('dashboard/collaborateur/ventes.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COLLABORATEUR')]
    #[Route('/dashboard/cl/parametres', name: 'app_dashboard_collaborateur_parametres')]
    public function collaborateurParametres(): Response
    {
        return $this->render('dashboard/collaborateur/parametres.html.twig', [
            'role' => 'ROLE_COLLABORATEUR',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/entreprises', name: 'app_dashboard_comptable_entreprises')]
    public function comptableEntreprises(): Response
    {
        return $this->render('dashboard/comptable/entreprises.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/bilan', name: 'app_dashboard_comptable_bilan')]
    public function comptableBilan(): Response
    {
        return $this->render('dashboard/comptable/bilan.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/plan', name: 'app_dashboard_comptable_plan')]
    public function comptablePlan(): Response
    {
        return $this->render('dashboard/comptable/plan.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/achats', name: 'app_dashboard_comptable_achats')]
    public function comptableAchats(): Response
    {
        return $this->render('dashboard/comptable/achats.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/ventes', name: 'app_dashboard_comptable_ventes')]
    public function comptableVentes(): Response
    {
        return $this->render('dashboard/comptable/ventes.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }

    #[IsGranted('ROLE_COMPTABLE')]
    #[Route('/dashboard/cp/transactions', name: 'app_dashboard_comptable_transactions')]
    public function comptableTransactions(): Response
    {
        return $this->render('dashboard/comptable/transactions.html.twig', [
            'role' => 'ROLE_COMPTABLE',
        ]);
    }
}
message.txt
9 Ko