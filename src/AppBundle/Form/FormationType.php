<?php

namespace AppBundle\Form;

use AppBundle\Entity\Module;
use AppBundle\Entity\Promotion;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle', TextType::class)
                ->add('description', TextType::class)
                ->add('assurate', EntityType::class, array(
                    'class'=>User::class,
                    'choice_label'=>'username',
                    'label'=>'Assurée par',
                    'multiple'=>true
                ))
                ->add('module', EntityType::class, array(
                    'class'=>Module::class,
                    'choice_label'=>'libelle',
                    'multiple'=>true
                ))
                ->add('promotion', EntityType::class, array(
                    'class'=>Promotion::class,
                    'choice_label'=>'designation',
                    'multiple'=>true
                ) )
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formation';
    }


}
