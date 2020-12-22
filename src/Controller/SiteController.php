<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Site;

class SiteController extends AbstractController
{
     /**
      * @Route("/", name="homepage")
      */
    public function sitelist(): Response
    {
        $aSites = $this->getDoctrine()->getRepository(Site::class)->findAll();

        return $this->render('display/home.html.twig', ['title' => 'Liste des sites', 'aSites' => $aSites]);
    }

    /**
      * @Route("/site/{codereseau}", name="detailsite")
      */
    public function detail($codereseau)
    {
        $oSite = $this->getDoctrine()->getRepository(Site::class)->findOneBy(['code_reseau' => $codereseau]);
        return $this->render('display/detailsite.html.twig', ['title' => 'Site ' . $oSite->getCodereseau(), 'oSite' => $oSite]);
    }

}