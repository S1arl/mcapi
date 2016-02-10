<?php

namespace MovieBundle\Form\Emotion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EmotionAddType extends AbstractType {

    public function getName() {
        return "EmotionAddType";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('emotion', TextType::class)
              
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'MovieBundle\Entity\Emotion',));
    }

}