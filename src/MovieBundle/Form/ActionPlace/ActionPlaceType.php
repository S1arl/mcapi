<?php

namespace MovieBundle\Form\ActionPlace;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActionPlaceType extends AbstractType {

    public function getName() {
        return "ActionPlace";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('locale', EntityType::class, array('class' => 'MovieBundle:ActionPlace', 'choice_label' => 'locale'))
                ->add('save', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver) {
       $resolver->setDefaults(array( 'data_class' => 'MovieBundle\Entity\ActionPlace'));
    }

}
