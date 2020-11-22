<?php

namespace App\Form;

use App\Entity\Bibliothequecriteremaintien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BibliolthequecriteremaintienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('absence',ChoiceType::class, [
                'choices' => [
                    'Maladie non professionnelle' => 'Maladie non professionnelle',
                    'Maladie professionnelle' => 'Maladie professionnelle',
                    'Accident du travail'=>'Accident du travail',
                    'Accident de trajet'=>'Accident de trajet'
                ],
            ])
            ->add('population',ChoiceType::class, [
                'choices' => [
                    'Ouvrier' => 'Ouvrier',
                    'Employé' => 'Employé',
                    'Agent de maitrise'=>'Agent de maitrise',
                    'Cadre article 4 et 4 bis'=>'Cadre article 4 et 4 bis'
                ],
            ])
            ->add('etendu')
            //->add('bibliothequeccn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequecriteremaintien::class,
        ]);
    }
}
