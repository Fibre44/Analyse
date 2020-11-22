<?php

namespace App\Form;

use App\Entity\Bibliothequeccn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class BibliothequeccnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idcc')
            ->add('libelle')
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Production' => 'Production',
                    'En attente' => 'En attente',                   
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequeccn::class,
        ]);
    }
}
