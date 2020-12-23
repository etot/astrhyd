<?php

namespace App\Controller;

use App\Entity\Finalite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "finalités"
*/
class FinaliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Finalite::class;
    }
}
