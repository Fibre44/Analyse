<?php

namespace App\Form;

use App\Entity\Bibliothequeplandepaie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliothequeplandepaieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naturerub')
            ->add('libelle')
            ->add('base')
            ->add('taux')
            ->add('coefficient')
            ->add('montant')
            ->add('tauxsalarial')
            ->add('tauxpatronal')
            //->add('bibliothequepopulationplandepaie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequeplandepaie::class,
        ]);
    }
}
