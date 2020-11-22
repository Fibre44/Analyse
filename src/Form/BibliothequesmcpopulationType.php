<?php

namespace App\Form;

use App\Entity\Bibliothequesmcpopulation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliothequesmcpopulationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('population')
            ->add('etendu')
            //->add('bibliothequeccn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequesmcpopulation::class,
        ]);
    }
}
