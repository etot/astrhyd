<?php

namespace App\Controller;

use App\Entity\MoSuivis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoSuivisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoSuivis::class;
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
