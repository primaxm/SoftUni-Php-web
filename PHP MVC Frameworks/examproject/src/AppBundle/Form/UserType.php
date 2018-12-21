<?php

namespace AppBundle\Form;

use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('birthDate', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('country', EntityType::class, [
                'class' => 'AppBundle:Country',
                'choice_label' => 'countryName',
                'placeholder' => 'choose country',
            ])
            ->add('city', EntityType::class, [
                'class' => 'AppBundle:City',
                'choice_label' => 'cityName',
                'placeholder' => 'choose city',
            ])
            ->add('gender', EntityType::class, [
                'class' => 'AppBundle:Gender',
                'choice_label' => 'gender',
                'placeholder' => 'choose gender',
            ]);
    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }



}
