<?php

namespace App\Form;

use App\Entity\Axe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AxeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Axe',ChoiceType::class, [
                'choices' => [
                    'A1' => 'A1',
                    'A2' => 'A2',
                    'A3' => 'A3',
                    'A4' => 'A4',
                    'A5' => 'A5',

                ],
            ])
            ->add('libelle')
            ->add('longueursection')
            //->add('societe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Axe::class,
        ]);
    }
}
