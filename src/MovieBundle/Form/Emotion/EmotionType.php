<?php

namespace MovieBundle\Form\Emotion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EmotionType extends AbstractType {

    public function getName() {
        return "EmotionType";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('emotion', EntityType::class, array('class' => 'MovieBundle:Emotion', 'choice_label' => 'emotion'))
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'MovieBundle\Entity\Emotion',));
    }

}