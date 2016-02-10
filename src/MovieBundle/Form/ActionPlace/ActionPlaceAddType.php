<?php

namespace MovieBundle\Form\ActionPlace;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActionPlaceAddType extends AbstractType {

    public function getName() {
        return "ActionPlaceAdd";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('locale', TextType::class)
             
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'MovieBundle\Entity\ActionPlace',));
    }

}
