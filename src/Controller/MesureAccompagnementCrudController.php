<?php

namespace App\Controller;

use App\Entity\MesureAccompagnement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "mesures d'accompagnement"
*/
class MesureAccompagnementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MesureAccompagnement::class;
    }
}
