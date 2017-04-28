<?php

namespace KZ\KwizBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('mode', ChoiceType::class, array(
                'expanded' => true,
                'choices' => array(
                    'Plateau' => 1,
                    'Mort Subite' => 2,
                    'Chrono' => 3
                ),
                'data' => 'Plateau'
            ))
            ->add('nbPlayer', ChoiceType::class, array(
                'choices' => array(
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15=> 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                ),
                'data' => 1
            ))
            ->add('level', EntityType::class, array(
                'class' => 'KZKwizBundle:Level',
                'expanded' => false,
                'multiple' => false,
                'choice_label' => 'name'
            ));
    }

    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KZ\KwizBundle\Entity\Party'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kz_kwizbundle_party';
    }


}
