<?php

namespace MovieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {

    public function getName() {
        return 'User';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('user', ChoiceType::class, array('choices'=> array('admin'=>'admin')))        
                ->add('movies', CollectionType::class, array(
                    'entry_type' => MoviesType::class,
                 
                    'allow_add' => true,
                    'by_reference' => false,
                    'prototype' => true,
                    
                ))
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'MovieBundle\Entity\User',
        ));
    }

}
