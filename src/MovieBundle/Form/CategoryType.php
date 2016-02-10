<?php

namespace MovieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CategoryType extends AbstractType {

    public function getName() {
        return "category";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('emotions', ChoiceType::class, array('choices' => $options['emotions'], 'choices_as_values' => true, 'multiple' => true, 'expanded' => true, 'required'=>true, 'label' => 'Let me feel like...'))
                ->add('actionYear', EntityType::class, array('class' => 'MovieBundle:ActionYear', 'choice_label' => 'year', 'expanded' => true, 'label' => 'Take me to...'))
                ->add('ActionPlace', ChoiceType::class, array('choices' => $options['action_place'], 'choices_as_values' => true, 'multiple' => true, 'expanded' => true, 'label' => 'Place of Action'))
                ->add('gender', ChoiceType::class, array('choices' => array('Male' => 'Male', 'Female' => 'Female'), 'multiple' => false, 'expanded' => true, 'label'=> 'Your gender'))
                ->add('brainy', ChoiceType::class, array('choices'=>array("YES, i like this movie" => "yes", "No, this movie did not fit me" => "no"), 'expanded' => true, 'label'=>'Did you like this movie?'))
                ->add('save', SubmitType::class, array('attr'=> array('class'=> 'image_button')));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setRequired(array(
            'action_place',
            'emotions',
        ));


        $resolver->setDefaults(array(
            'data_class' => 'MovieBundle\Entity\Category',
        ));
    }

    public function getDefaultOptions(array $options) {
        return array(
            'my_option' => false
        );
    }

}
