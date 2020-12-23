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
      * page d'accueil = liste des sites
      */
    public function sitelist(): Response
    {
        $aSites = $this->getDoctrine()->getRepository(Site::class)->findAll();

        return $this->render('display/home.html.twig', ['title' => 'Liste des sites', 'aSites' => $aSites]);
    }

    /**
      * @Route("/site/{codereseau}", name="detailsite")
      * page détail = affiche du site dont le code réseau est passé dans l'URL, 
      * avec stations, points de prélèvements et opérations de prélèvement associés
      */
    public function detail($codereseau)
    {
        $oSite = $this->getDoctrine()->getRepository(Site::class)->findOneBy(['code_reseau' => $codereseau]);
        return $this->render('display/detailsite.html.twig', ['title' => 'Site ' . $oSite->getCodereseau(), 'oSite' => $oSite]);
    }

}