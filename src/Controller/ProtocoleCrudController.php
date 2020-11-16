<?php

namespace App\Controller;

use App\Entity\Protocole;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProtocoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Protocole::class;
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
