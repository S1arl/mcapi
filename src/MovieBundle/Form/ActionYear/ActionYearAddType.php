<?php

namespace MovieBundle\Form\ActionYear;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActionYearAddType extends AbstractType {

    public function getName() {
        return "ActionYearAdd";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('year', TextType::class)
              
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'MovieBundle\Entity\ActionYear',));
    }

}
