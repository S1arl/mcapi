<?php
namespace MovieBundle\Form\ActionYear;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ActionYearType extends AbstractType {

    public function getName() {
        return "ActionYearType";
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('year', EntityType::class, array('class' => 'MovieBundle:ActionYear', 'choice_label' => 'year'))
                ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'MovieBundle\Entity\ActionYear',));
    }

}