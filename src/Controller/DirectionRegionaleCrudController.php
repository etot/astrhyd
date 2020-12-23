<?php

namespace App\Controller;

use App\Entity\DirectionRegionale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "directions régionales"
*/
class DirectionRegionaleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DirectionRegionale::class;
    }
}
