<?php

namespace App\Controller;

use App\Entity\MoTravaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "MO travaux"
*/
class MoTravauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoTravaux::class;
    }
}
