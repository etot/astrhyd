<?php

namespace App\Controller;

use App\Entity\TypeTravaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "types de travaux"
*/
class TypeTravauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeTravaux::class;
    }
}
