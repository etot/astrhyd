<?php

namespace App\Controller;

use App\Entity\PointPrelevement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use App\Form\OperationPrelevementType;

class PointPrelevementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PointPrelevement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('num_base'),
            TextField::new('support'), 
            NumberField::new('coord_x_l93'),
            NumberField::new('coord_y_l93'),
            TextField::new('station_point')->hideOnIndex(), 
            TextField::new('reseau_station_point')->hideOnIndex(), 
            TextField::new('reseau_station')->hideOnIndex(),    
            AssociationField::new('station'),
            
            CollectionField::new('operationPrelevements', 'OperationPrelevement')
                ->allowAdd() 
                ->allowDelete()
                // ->setEntryIsComplex(true)
                ->setEntryType(OperationPrelevementType::class),
                // ->setFormTypeOptions(['by_reference' => 'false']),
            
        ];
    }
}
