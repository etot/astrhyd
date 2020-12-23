<?php

namespace App\Controller;

use App\Entity\BaseStockage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "bases de stockage"
*/
class BaseStockageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BaseStockage::class;
    }
}
