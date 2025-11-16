<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard/entreprises', name: 'app_dashboard_entreprises')]
    public function entreprises(): Response
    {
        return $this->render('dashboard/entreprises.html.twig', [
            'entreprises' => 'DashboardController',
        ]);
    }
    
    #[Route('/dashboard/audit', name: 'app_dashboard_audit')]
    public function audit(): Response
    {
        return $this->render('dashboard/audit.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    
    #[Route('/dashboard/stats', name: 'app_dashboard_stats')]
    public function stats(): Response
    {
        return $this->render('dashboard/statistiques.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/dashboard/parametres', name: 'app_dashboard_param')]
    public function param(): Response
    {
        return $this->render('dashboard/parametres.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/dashboard/config', name: 'app_dashboard_config')]
    public function config(): Response
    {
        return $this->render('dashboard/config.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
