<?php

namespace App\Controller;

use App\Entity\MoTravaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoTravauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoTravaux::class;
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
