<?php

namespace App\Form;

use App\Entity\Tauxat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TauxatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coderisque')
            ->add('tauxbureau')
            ->add('taux')
            ->add('dateapplication')
            //->add('etablissement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tauxat::class,
        ]);
    }
}
