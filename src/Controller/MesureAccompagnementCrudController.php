<?php

namespace App\Controller;

use App\Entity\MesureAccompagnement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MesureAccompagnementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MesureAccompagnement::class;
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
