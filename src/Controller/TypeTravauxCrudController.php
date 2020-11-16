<?php

namespace App\Controller;

use App\Entity\TypeTravaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeTravauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeTravaux::class;
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
