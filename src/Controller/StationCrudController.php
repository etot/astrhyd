<?php

namespace App\Controller;

use App\Entity\PointPrelevement;
use App\Entity\Station;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Symfony\Component\HttpClient\HttpClient;

class StationCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Station::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $getpointsprelev = Action::new('setPointsPrelevements', 'Associer les points de prélèvements depuis le Sandre', 'fa fa-map-pin')
        ->linkToCrudAction('setPointsPrelevements');

        return $actions->add(Crud::PAGE_EDIT, $getpointsprelev);
    }

    public function setPointsPrelevements(AdminContext $context)
    {
        $oCurrentStation = $context->getEntity()->getInstance(); 

        $code = $oCurrentStation->getCode();
        $url = 'https://api.sandre.eaufrance.fr/referentiels/v1/stq.json?outputSchema=SANDREv4&filter=%3CFilter%3E%3CIS%3E%3CField%3ECdStationMesureEauxSurface%3C%2FField%3E%3CValue%3E' . $code . '%3C%2FValue%3E%3C%2FIS%3E%3C%2FFilter%3E&limit=100';
        
        $client = HttpClient::create();
        $oPPresponse = $client->request('GET', $url);
        $aContent = $oPPresponse->toArray();

        $entityManager = $this->getDoctrine()->getManager();
            
        // suppression des points actuellement associés à la station
        // cette opération est faite après l'appel à l'API Sandre, afin de ne pas les supprimer si la requête n'aboutit pas
        $aCurrentPtsPrelevements = $oCurrentStation->getOperationPrelevements();
        foreach($aCurrentPtsPrelevements as $oCurrentPtPrelevement)
        {
            $oCurrentStation->removeOperationPrelevement($oCurrentPtPrelevement);
        }
        
        $aPointPrelEauxSurf = $aContent['REFERENTIELS']['Referentiel']['StationMesureEauxSurface'][0]['PointPrelEauxSurf'];
        foreach($aPointPrelEauxSurf as $oPointPrelEauxSurf)
        {
            $oNewPtPrelev = new PointPrelevement();
            $oNewPtPrelev->setStation($oCurrentStation);
            $oNewPtPrelev->setSite($oCurrentStation->getSites()[0]); // TODO QUID si plusieurs sites ?
            $oNewPtPrelev->setSupport($oPointPrelEauxSurf['SupportPtPrel']['CdSupport']);
            $oNewPtPrelev->setCoordXL93($oPointPrelEauxSurf['CoordXPointEauxSurf']);
            $oNewPtPrelev->setCoordYL93($oPointPrelEauxSurf['CoordYPointEauxSurf']);
            $oNewPtPrelev->setNumBase($oPointPrelEauxSurf['CdPointEauxSurf']); 
/*
TODO vérifier si d'autres champs sont nécessaires

attendus (cf specs)
    Point  Prélèvement  
    station_point
    reseau_station_point
    reseau_station

reçus (schéma Sandre)
    CdPointEauxSurf
    TypPointEauxSurf
    LbPointEauxSurf       
    ProjPointEauxSurf
    ModeObtentionPointEauxSurf
    NaturePointEauxSurf
    DateMiseServicePointEauxSurf
    DateMajPointEauxSurf
    RsxStationPeriod[] 
        DateDebutAppartReseauMesure 
        DispositifCollecte
            CodeSandreRdd
*/
            $entityManager->persist($oNewPtPrelev);            
            $oCurrentStation->addPointPrelevement($oNewPtPrelev); 
            // $entityManager->flush();
        }
        $entityManager->flush();
        // TODO renvoie vers la page d'édition
        return parent::edit($context);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('code')->setRequired(true),
            TextField::new('nom'),
            TextField::new('code_masse_eau')->setRequired(true),
            TextField::new('nom_masse_eau'),
            TextEditorField::new('detail_situation')->hideOnIndex(),
            TextEditorField::new('precision_positionnement')->hideOnIndex(),
            BooleanField::new('suivi_indicateurs_fonctionnels')->hideOnIndex(),
            AssociationField::new('finalite')->setRequired(true)->hideOnIndex(),
            AssociationField::new('pointPrelevements')->hideOnIndex(),
        ];
    }
}
