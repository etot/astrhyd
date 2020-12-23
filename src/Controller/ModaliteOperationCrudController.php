<?php

namespace App\Controller;

use App\Entity\ModaliteOperation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
* formulaire de gestion de la nomenclature "modalités de l'opération"
*/
class ModaliteOperationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModaliteOperation::class;
    }
}
