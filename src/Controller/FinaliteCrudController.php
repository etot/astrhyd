<?php

namespace App\Controller;

use App\Entity\Finalite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FinaliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Finalite::class;
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
