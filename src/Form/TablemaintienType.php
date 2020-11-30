<?php

namespace App\Form;

use App\Entity\Tablemaintien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TablemaintienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anciennetedebut')
            ->add('anciennetefin')
            ->add('jourscarenceemployeur')
            ->add('dureemaximale')
            ->add('tauxmaintien')
            //->add('criteremaintien')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tablemaintien::class,
        ]);
    }
}
