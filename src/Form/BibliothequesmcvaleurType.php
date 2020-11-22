<?php

namespace App\Form;

use App\Entity\Bibliothequesmcvaleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliothequesmcvaleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coefficient')
            ->add('qualification')
            ->add('niveau')
            ->add('smc')
            //->add('bibliothequesmcpopulation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bibliothequesmcvaleur::class,
        ]);
    }
}
