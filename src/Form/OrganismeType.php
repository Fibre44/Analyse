<?php

namespace App\Form;

use App\Entity\Organisme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganismeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('nature')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
            ->add('typepaiement')
            //->add('etablissement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Organisme::class,
        ]);
    }
}
