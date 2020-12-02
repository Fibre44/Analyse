<?php

namespace App\Form;

use App\Entity\Bibliothequemodification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliothequemodificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('demande')
            //->add('ancienid')
            //->add('ancienvaleur')
            ->add('nouvellevaleur')
            //->add('bibliothequeccn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequemodification::class,
        ]);
    }
}
