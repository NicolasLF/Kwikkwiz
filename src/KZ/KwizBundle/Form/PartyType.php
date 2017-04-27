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
                    1 => 'Plateau',
                    2 => 'Mort Subite',
                    3 => 'Chrono'
                ),
                'data' => 'Plateau'
            ))
            ->add('nbPlayer', ChoiceType::class, array(
                'choices' => array(
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4
                ),
                'data' => 1
            ))
            ->add('level', EntityType::class, array(
                'class' => 'KZKwizBundle:Level',
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
