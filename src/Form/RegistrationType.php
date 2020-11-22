<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('groupe',ChoiceType::class, [
                'choices' => [
                    'Consultant' => 'Consultant',
                    'Client' => 'Client',
                    'Directeur de projet' => 'Directeur de projet',
                ],
            ])
            ->add('password', PasswordType::class)
            ->add('confirm_password',PasswordType::class)
            //->add('username')
            //->add('projets') erreur impossible de convertir int en string
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
