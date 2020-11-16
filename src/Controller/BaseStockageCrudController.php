<?php

namespace App\Controller;

use App\Entity\BaseStockage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BaseStockageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BaseStockage::class;
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
