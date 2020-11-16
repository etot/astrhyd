<?php

namespace App\Form;

use App\Entity\OperationPrelevement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationPrelevementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code_operation')
            ->add('date_prelevement')
            ->add('interlocuteur_suivis')
            ->add('conformite_ssm')
            ->add('Precision')
            ->add('commentaire')
            //->add('site')
            //->add('station')
            //->add('pointPrelevement')
            ->add('mo_suivi')
            ->add('protocole')
            ->add('banque_stockage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OperationPrelevement::class,
        ]);
    }
}
