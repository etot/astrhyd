<?php

namespace App\Controller;

use App\Entity\Station;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class StationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Station::class;
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
            BooleanField::new('suivi_indicateurs_fonctionnels')->setRequired(true)->hideOnIndex(),
            AssociationField::new('finalite')->setRequired(true)->hideOnIndex(),
            AssociationField::new('pointPrelevements')->hideOnIndex(),
        ];
    }
}
