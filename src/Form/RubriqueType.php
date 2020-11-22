<?php

namespace App\Form;

use App\Entity\Rubrique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RubriqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('libelle')
            ->add('type')
            ->add('nature')
            ->add('base')
            ->add('taux')
            ->add('montant')
            ->add('profilrem')
            ->add('periodeapplication')
            ->add('population')
            ->add('divers')
            ->add('dsnperiodeprime', ChoiceType::class, [
                'choices' => [
                    'Aucun' => 'Aucun',
                    'Mois' => 'Mois',
                    'Bimestre' => 'Bimestre',
                    'Trimestre' => 'Trimestre',
                ],
            ])
            ->add('dsnnatureprime', ChoiceType::class, [
                'choices' => [
                    '001-Indemnité spécifique' => '001-Indemnité spécifique',
                    '002-Indemnité versée à l occasion ...' => '002-Indemnité versée à l occasion ...',
                    'Bimestre' => 'Bimestre',
                    'Trimestre' => 'Trimestre',
                ],
            ])
            ->add('dsnautreselement')
            ->add('dsntyperappelpaie')

            //->add('societe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rubrique::class,
        ]);
    }
}
