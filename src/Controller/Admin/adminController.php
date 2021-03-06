<?php

namespace App\Controller\Admin;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Entity\Studio;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class adminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EvaluationSymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Movies', 'fas fa-list', Movie::class);
        yield MenuItem::linkToCrud('Actors', 'fas fa-list', Actor::class);
        yield MenuItem::linkToCrud('Studios', 'fas fa-list', Studio::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);



    }
}
