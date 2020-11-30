<?php

namespace App\Form;

use App\Entity\Criteremaintien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CriteremaintienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('absence',ChoiceType::class, [
                'choices' => [
                'Maladie' => 'Maladie',
                'Accident du travail' => 'Accident du travail',
                'Accident du trajet' => 'Accident du trajet',
                'Maladie pro' => 'Maladie pro',
                ],
            ])
            ->add('population',ChoiceType::class, [
                'choices' => [
                'Cadre' => 'Cadre',
                'Ouvrier' => 'Ouvrier',
                'Employé' => 'Employé',
                'Agent de maitrise' => 'Agent de maitrise',
                ],
            ])
            //->add('ccn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Criteremaintien::class,
        ]);
    }
}
