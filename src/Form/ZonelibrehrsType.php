<?php

namespace App\Form;

use App\Entity\Zonelibrehrs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ZonelibrehrsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nature', ChoiceType::class, [
                'choices' => [
                    'Code Statistique' => 'Code Statistique',
                    'Code Organisation 1' => 'Code Organisation 1',
                    'Code Organisation 2' => 'Code Organisation 2',
                    'Code Organisation 3' => 'Code Organisation 3',
                    'Code Organisation 4' => 'Code Organisation 4',
                    'Tablette Libre 1' => 'Tablette Libre 1',
                    'Tablette Libre 2' => 'Tablette Libre 2',
                    'Tablette Libre 3' => 'Tablette Libre 3',
                    'Tablette Libre 4' => 'Tablette Libre 4',
                ],
            ])
            ->add('libelle')
            //->add('societe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Zonelibrehrs::class,
        ]);
    }
}
