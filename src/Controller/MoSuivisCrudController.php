<?php

namespace App\Controller;

use App\Entity\MoSuivis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "MO suivi"
*/
class MoSuivisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoSuivis::class;
    }
}
