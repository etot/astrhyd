<?php

namespace App\Controller;

use App\Entity\Site;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\HttpClient\HttpClient;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use Symfony\Component\Form\FormBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

/**
* @IsGranted("ROLE_USER")
*/
class SiteCrudController extends AbstractCrudController
{
    public $oCurrentSite;

    public static function getEntityFqcn(): string
    {
        return Site::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addJsFile('js/siteform.js');
    }

    // permet de récupérer les valeurs d'un site édité dans le formulaire d'édit
    // afin de pré-remplir le champ "communes" à partir de la valeur de "département"
    public function edit(AdminContext $context)
    {
        $this->oCurrentSite = $context->getEntity()->getInstance();
        return parent::edit($context);
    }

    // permet d'éviter le problème lié à l'ajout de communes en ajax (this value is not valid)
    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        $formBuilder->get('commune')->resetViewTransformers();
        $formBuilder->get('code_reseau')->resetViewTransformers();
        return $formBuilder;
    }

    // permet d'éviter le problème lié à l'ajout de communes en ajax (this value is not valid)
    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        $formBuilder->get('commune')->resetViewTransformers();
        $formBuilder->get('code_reseau')->resetViewTransformers();
        return $formBuilder;
    }

    public function configureFields(string $pageName): iterable
    {        
        $aYears = array();
        for($i=1990; $i<=date('Y')+1; $i++) 
        {
            $aYears[$i] = $i;
        }

        $client = HttpClient::create();

        $aDCCodes = array();

        // codes réseaux
        if($pageName != Crud::PAGE_INDEX) // pour ne pas faire un appel inutile à l'API sur index
        {
            $oCRresponse = $client->request('GET', 'https://api.sandre.eaufrance.fr/referentiels/v1/dc.json?outputSchema=SANDREv4');
            $aContent = $oCRresponse->toArray();

            $aDispositifsCollecte = $aContent['REFERENTIELS']['Referentiel']['DispositifCollecte'];
            foreach($aDispositifsCollecte as $aDispositifCollecte)
            {
                $aDCCodes[$aDispositifCollecte['CodeSandreRdd'] . ' ' . $aDispositifCollecte['NomRdd']] = $aDispositifCollecte['CodeSandreRdd'];
            }
        }

        // départements
        $oDepresponse = $client->request('GET', 'https://geo.api.gouv.fr/departements');
        $aDepartementsArray = $oDepresponse->toArray();
        $aDepts = array();
        foreach($aDepartementsArray as $aDepartement)
        {
            $aDepts[$aDepartement['code'] . ' ' . $aDepartement['nom']] = $aDepartement['code'];
        }

        // villes
        $sCurrentDept = '01';
        $aCities = array();
        if(is_object($this->oCurrentSite) && !is_null($this->oCurrentSite->getDepartement()))
        {
            $sCurrentDept = $this->oCurrentSite->getDepartement();
        }

        $oCitiesresponse = $client->request('GET', 'https://geo.api.gouv.fr/departements/' . $sCurrentDept . '/communes');
        $aCitiesArray = $oCitiesresponse->toArray();
        foreach($aCitiesArray as $aCity)
        {
            $aCities[$aCity['nom']] = $aCity['nom'];
        }        

        return [
            FormField::addPanel('Identification')
                ->setIcon('fa fa-info')
                ->collapsible(true)
                ->renderCollapsed(false),
            IdField::new('id')->hideOnForm(),
            
            ($pageName != Crud::PAGE_INDEX)?ChoiceField::new('code_reseau')->setChoices($aDCCodes):TextField::new('code_reseau'),
            
            AssociationField::new('agence')
                ->setCustomOptions(array('widget' => 'native')) // otherwise can't be required : https://github.com/EasyCorp/EasyAdminBundle/issues/3497
                ->setRequired(true)
                ->hideOnIndex(),      
            AssociationField::new('direction_regionale')->hideOnIndex()->setFormTypeOptions(array('required' => true)),
            TextField::new('code_entite_hydro')->hideOnIndex(),
            TextField::new('toponyme'),
            TextField::new('code_entite_hydro_2')->hideOnIndex(),
            TextField::new('toponyme_autre')->hideOnIndex(),
            ChoiceField::new('departement')->setChoices($aDepts),
            
            ($pageName != Crud::PAGE_INDEX)?ChoiceField::new('commune')->setChoices($aCities):TextField::new('commune'),
                        
            TextField::new('diagnostic')->hideOnIndex(),

            FormField::addPanel('Type de travaux')
                ->setIcon('fa fa-hard-hat')
                ->collapsible(true)
                ->renderCollapsed(true),
            AssociationField::new('type_travaux_prevus')->hideOnIndex()->setFormTypeOptions(array('required' => true)),
            AssociationField::new('type_travaux_realises_principal')->hideOnIndex()->setFormTypeOptions(array('required' => true)),
            AssociationField::new('type_travaux_realises_secondaire')->hideOnIndex(),
            AssociationField::new('type_travaux_realises_accessoire')->hideOnIndex(),
        
            FormField::addPanel('Modalités')
                ->setIcon('fa fa-tools')
                ->collapsible(true)
                ->renderCollapsed(true),
            AssociationField::new('modalites_operation')->hideOnIndex(),
            AssociationField::new('mesures_accompagnement')->hideOnIndex(),
            AssociationField::new('mo_travaux')->hideOnIndex()->setFormTypeOptions(array('required' => true)),
            TextField::new('interlocuteur')->hideOnIndex(),

            FormField::addPanel('Détails site')
                ->setIcon('fa fa-calculator')
                ->collapsible(true)
                ->renderCollapsed(true),
            IntegerField::new('long_lineaire_restaure')->hideOnIndex(),
            IntegerField::new('largeur_plein_bords_naturelle')->hideOnIndex(),
            TextField::new('code_roe')->hideOnIndex(),
            IntegerField::new('hauteur_chute_etiage_roe')->hideOnIndex(),
            IntegerField::new('hauteur_chute_hors_roe')->hideOnIndex(),
        
            FormField::addPanel('Période travaux')
                ->setIcon('fa fa-calendar-alt')
                ->collapsible(true)
                ->renderCollapsed(true),
            ChoiceField::new('annee_debut_travaux_prevus')->setChoices($aYears)->hideOnIndex(),
            ChoiceField::new('annee_fin_travaux_prevus')->setChoices($aYears)->hideOnIndex(),
            ChoiceField::new('annee_effective_debut_travaux')->setChoices($aYears)->hideOnIndex(),
            ChoiceField::new('annee_effective_fin_travaux')->setChoices($aYears)->hideOnIndex(),
            
            FormField::addPanel('Description')
                ->setIcon('fa fa-pencil-alt')
                ->collapsible(true)
                ->renderCollapsed(true),
            TextEditorField::new('descriptif_travaux')->hideOnIndex(),
            TextEditorField::new('elements_contexte')->hideOnIndex(),      
    
            FormField::addPanel('Stations')
            ->setIcon('fa fa-cogs')
            ->collapsible(true)
            ->renderCollapsed(true),
            AssociationField::new('stations'),
        ];
    }
}
