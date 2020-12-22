<?php

namespace App\Controller;

use App\Entity\PointPrelevement;
use App\Entity\Station;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Symfony\Component\HttpClient\HttpClient;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

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

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            //->addJsFile('https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js')
            ->addCssFile('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')
            //->addJsFile('https://code.jquery.com/jquery-1.12.4.js')
            ->addJsFile('https://code.jquery.com/ui/1.12.1/jquery-ui.js')
            ->addJsFile('js/stationform.js');
    }

    public function setPointsPrelevements(AdminContext $context)
    {
        $oCurrentStation = $context->getEntity()->getInstance(); 

        $crudUrlGenerator = $this->get(CrudUrlGenerator::class);
        $redirectUrl = $crudUrlGenerator->build()
            ->setController(StationCrudController::class)
            ->setAction('edit')
            ->generateUrl();
            
        $aCurrentPtsPrelevements = $oCurrentStation->getPointPrelevements();

        // si la station est déjà associée à des points de prélèvements 
        // alors on ne fait rien
        if(!$aCurrentPtsPrelevements->isEmpty())
        {
            $this->addFlash('warning', 'Vous ne pouvez pas associer automatiquement des points de prélèvements à cette station car des points de prélèvements y sont déjà associés.');
            return $this->redirect($redirectUrl);
        }

        $code = $oCurrentStation->getCode();
        
        // TODO utiliser cette URL plus simple
        // $sandreApiUrl =  'https://api.sandre.eaufrance.fr/referentiels/v1/stq/';  
        // $sandreApiUrl .= $code . '.json';
        
        $sandreApiUrl = 'https://api.sandre.eaufrance.fr/referentiels/v1/stq.json?outputSchema=SANDREv4&filter=%3CFilter%3E%3CIS%3E%3CField%3ECdStationMesureEauxSurface%3C%2FField%3E%3CValue%3E';
        $sandreApiUrl .= $code . '%3C%2FValue%3E%3C%2FIS%3E%3C%2FFilter%3E&limit=100';
        $sandreApiUrl .= '&compress=true';

        $client = HttpClient::create();
        $oGzPPresponse = $client->request('GET', $sandreApiUrl);
        $aContent = json_decode(gzdecode($oGzPPresponse->getContent()), true); 

        $entityManager = $this->getDoctrine()->getManager();
        
        $aPointPrelEauxSurf = $aContent['REFERENTIELS']['Referentiel']['StationMesureEauxSurface'][0]['PointPrelEauxSurf'];
        
        if(isset($aPointPrelEauxSurf[0])) // cas où c'est un tableau de points de preleb
        {
            foreach($aPointPrelEauxSurf as $oPointPrelEauxSurf)
            {
                /*
                Règle de gestion :	Seuls les points dont les codes supports 
                sont 3 (support eau), 4 (poissons), 10 (diatomées), 13 (invertébrés benthiques), 
                27 (macrophytes) ou 69 (lit) peuvent être intégrés. 
                Si le code support n'est pas renseigné (ou mis en «0» -inconnu), 
                le point ne peut être intégré dans la base.
                */
                if(in_array($oPointPrelEauxSurf['SupportPtPrel']['CdSupport'], array('3', '4', '10', '13', '27', '69')))
                {
                    $oNewPtPrelev = new PointPrelevement();
                    $oNewPtPrelev->setStation($oCurrentStation);
                    $oNewPtPrelev->setSupport($oPointPrelEauxSurf['SupportPtPrel']['CdSupport']);
                    $oNewPtPrelev->setCoordXL93($oPointPrelEauxSurf['CoordXPointEauxSurf']);
                    $oNewPtPrelev->setCoordYL93($oPointPrelEauxSurf['CoordYPointEauxSurf']);
                    $oNewPtPrelev->setNumBase($oPointPrelEauxSurf['CdPointEauxSurf']); 
                    $entityManager->persist($oNewPtPrelev);            
                    $oCurrentStation->addPointPrelevement($oNewPtPrelev); 
                }
            }
        }
        elseif(isset($aPointPrelEauxSurf['CdPointEauxSurf'])) // cas où un seul point de prelev
        {
            if(in_array($aPointPrelEauxSurf['SupportPtPrel']['CdSupport'], array('3', '4', '10', '13', '27', '69')))
            {
                $oNewPtPrelev = new PointPrelevement();
                $oNewPtPrelev->setStation($oCurrentStation);
                $oNewPtPrelev->setSupport($aPointPrelEauxSurf['SupportPtPrel']['CdSupport']);
                $oNewPtPrelev->setCoordXL93($aPointPrelEauxSurf['CoordXPointEauxSurf']);
                $oNewPtPrelev->setCoordYL93($aPointPrelEauxSurf['CoordYPointEauxSurf']);
                $oNewPtPrelev->setNumBase($aPointPrelEauxSurf['CdPointEauxSurf']); 
                $entityManager->persist($oNewPtPrelev);            
                $oCurrentStation->addPointPrelevement($oNewPtPrelev); 
            }
        }
        $entityManager->flush();

        $this->addFlash('success', 'Les points de prélèvements déclarés dans le Sandre ont bien été associés à cette station.');
            
        return $this->redirect($redirectUrl);
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
            AssociationField::new('pointPrelevements'),
        ];
    }
}
