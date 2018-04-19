<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PhoneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('model')
                ->add('height')
                ->add('isSmart')
                ->add('obs')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('brand', EntityType::class ,array('class' => 'AppBundle:Brand',
                      'expanded' => false, 'multiple'=>false)) //Forçar o tipo de campo com o EntityType
                ->add('operator', EntityType::class ,array('class' => 'AppBundle:Operator',
                      'expanded' => true, 'multiple'=>true)); //Forçar o tipo de campo com o EntityType
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Phone'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_phone';
    }


}
