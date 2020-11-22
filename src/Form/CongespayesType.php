<?php

namespace App\Form;

use App\Entity\Congepaye;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CongespayesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                '2,50' => '2,50',
                '2,08' => '2,08',
                ],
            ])
            ->add('finexercice')
            ->add('reliquat',ChoiceType::class, [
                'choices' => [
                'Pas de gestion du reliquat' => 'Pas de gestion du reliquat',
                'Conservation des CP' => 'Conservation des CP',
                ],
            ])
            ->add('cpanciennete')
            ->add('cpsupplementaire')
            ->add('arrondi',ChoiceType::class, [
                'choices' => [
                'Pas d arrondi' => 'Pas d arrondi           ',
                'Demi supérieur' => 'Demi supérieur',
                'Demi inférieur' => 'Demi inférieur',
                'Entier supérieur' => 'Entier supérieur',

                ],
            ])
            ->add('arrondistc',ChoiceType::class, [
                'choices' => [
                'Pas d arrondi' => 'Pas d arrondi           ',
                'Idem arrondi fin exercice' => 'Idem arrondi fin exercice',
                ],
            ])

            //->add('etablissement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Congepaye::class,
        ]);
    }
}
