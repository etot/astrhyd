<?php

namespace App\Controller;

use App\Entity\ModaliteOperation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModaliteOperationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModaliteOperation::class;
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
