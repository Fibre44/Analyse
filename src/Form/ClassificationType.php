<?php

namespace App\Form;

use App\Entity\Classification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ClassificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Coefficient' => 'Coefficient',
                    'Qualification' => 'Qualification',
                    'Niveau' => 'Niveau',
                    'Indice' => 'Indice',
                ],
            ])
            ->add('valeur')
            //->add('conventioncollective')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classification::class,
        ]);
    }
}
