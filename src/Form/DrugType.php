<?php

namespace App\Form;

use App\Entity\Drug;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DrugType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('manufacturer')
            ->add('name')
            ->add('batchNumber')
            ->add('addedAt')
            ->add('expiryDate')
            ->add('quantity')
            ->add('pricePerUnit')
            ->add('types')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Drug::class,
        ]);
    }
}
