<?php

namespace App\Form;

use App\Entity\Bibliothequepopulationplandepaie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class BibliothequepopulationplandepaieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('logiciel', ChoiceType::class, [
                'choices' => [
                'HR SPRINT' => 'HR SPRINT',
                'HR ULTIMATE' => 'HR ULTIMATE',
                ],
            ])
            ->add('regimess', ChoiceType::class, [
                'choices' => [
                'MSA' => 'MSA',
                'Régime Général' => 'Régime Général',
                ],
            ])
            ->add('population')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequepopulationplandepaie::class,
        ]);
    }
}
