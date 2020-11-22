<?php

namespace App\Form;

use App\Entity\Absence;
use App\Entity\Tauxabsence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AbsenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motif')
            ->add('description')
            ->add('motifdsn')
            ->add('calendrier')
            ->add('tauxheure', Entitytype::class,[
                'class'=> Tauxabsence::class,
                'choice_label'=>'libelle'

            ])
            //->add('tauxabsence')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Absence::class,
        ]);
    }
}
