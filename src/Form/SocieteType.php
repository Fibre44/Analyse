<?php

namespace App\Form;

use App\Entity\Societe;
use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siren')
            ->add('raisonsociale')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
           ->add('fnal', ChoiceType::class, [
            'choices' => [
                'FNAL 0.10%' => 'FNAL 0.10%',
                'FNAL 0.50%' => 'FNAL 0.50%',
                
            ],
        ])
        ->add('etendu', ChoiceType::class, [
            'choices' => [
                'Application UNIQUEMENT des valeurs etendues' => '0',
                'Application des valeurs non etendues' => '1',
                
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
