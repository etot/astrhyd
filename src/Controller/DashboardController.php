<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use App\Entity\User;
use App\Entity\Agence;
use App\Entity\BaseStockage;
use App\Entity\DirectionRegionale;
use App\Entity\Finalite;
use App\Entity\ModaliteOperation;
use App\Entity\MoSuivis;
use App\Entity\MoTravaux;
use App\Entity\Protocole;
use App\Entity\MesureAccompagnement;
use App\Entity\TypeTravaux;
use App\Entity\Station;
use App\Entity\PointPrelevement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_USER")
*/
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/saisie", name="admin")
     * page d'accueil du backoffice
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routeBuilder->setController(SiteCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Astrhyd');
    }

    /*
    * menu de gauche du backoffice
    */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Sites', 'fa fa-home');
        yield MenuItem::linkToCrud('Stations', 'fa fa-cogs', Station::class);
        yield MenuItem::linkToCrud('PointPrelevement', 'fa fa-map-pin', PointPrelevement::class);
        yield MenuItem::section('Administration');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield MenuItem::section('Nomenclatures');
        yield MenuItem::linkToCrud('Agences', 'fa fa-building', Agence::class);
        yield MenuItem::linkToCrud('Bases de stockage', 'fa fa-database', BaseStockage::class);
        yield MenuItem::linkToCrud('Directions régionales', 'fa fa-landmark', DirectionRegionale::class);
        yield MenuItem::linkToCrud('Finalités', 'fa fa-bullseye', Finalite::class);
        yield MenuItem::linkToCrud('Mesures d\'accompagnement', 'fa fa-tree', MesureAccompagnement::class);
        yield MenuItem::linkToCrud('Modalités d\'opérations', 'fa fa-bacon', ModaliteOperation::class);
        yield MenuItem::linkToCrud('MO Suivis', 'fa fa-user-tie', MoSuivis::class);
        yield MenuItem::linkToCrud('MO Travaux', 'fa fa-hard-hat', MoTravaux::class);
        yield MenuItem::linkToCrud('Protocoles', 'fa fa-microscope', Protocole::class);
        yield MenuItem::linkToCrud('Types de travaux', 'fa fa-wrench', TypeTravaux::class);
    }
}
