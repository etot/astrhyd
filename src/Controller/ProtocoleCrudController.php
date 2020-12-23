<?php

namespace App\Controller;

use App\Entity\Protocole;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "protocoles"
*/
class ProtocoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Protocole::class;
    }
}
