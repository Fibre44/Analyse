<?php

namespace App\Form;

use App\Entity\Bibliothequeclassification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class BibliothequeclassificationType extends AbstractType
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
            //->add('bibliothequeccn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequeclassification::class,
        ]);
    }
}
