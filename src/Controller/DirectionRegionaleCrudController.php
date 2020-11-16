<?php

namespace App\Controller;

use App\Entity\DirectionRegionale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DirectionRegionaleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DirectionRegionale::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
