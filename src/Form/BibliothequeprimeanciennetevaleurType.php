<?php

namespace App\Form;

use App\Entity\Bibliothequeprimeanciennetevaleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class BibliothequeprimeanciennetevaleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anciennetemois')
            ->add('signe', ChoiceType::class, [
                'choices' => [
                '=' => '=',
                '<' => '<',
                '=<' => '=<',
                '>' => '>',
                '=>' => '=>',
                ],
            ])
            ->add('pourcentage')
            //->add('bibliothequeprimeanciennetepopulation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequeprimeanciennetevaleur::class,
        ]);
    }
}
