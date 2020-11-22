<?php

namespace App\Form;

use App\Entity\Pourcentagemaintien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PourcentagemaintienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nbrejours')
            ->add('pourcentage')
            ->add('Maintiensalaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pourcentagemaintien::class,
        ]);
    }
}
