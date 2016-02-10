<?php

namespace MovieBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MoviesType extends AbstractType {

    public function getName() {
        return 'Movies';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', TextType::class)
                ->add('year', EntityType::class, array(
                    'class' => 'MovieBundle:OutputYear',
                    'multiple' => false,
                ))
                ->add('country', EntityType::class, array('class' => 'MovieBundle:Country', 'choice_label' => 'country'))
                ->add('review', TextareaType::class)
                ->add('trailer', UrlType::class)
                ->add('emotions', EntityType::class, array('class' => 'MovieBundle:Emotion', 'choice_label'=>'emotion', 'multiple' => true, 'expanded' => true))
                ->add('yearEvents', EntityType::class, array('class' => 'MovieBundle:ActionYear', 'choice_label' => 'year', 'expanded' => true))
                ->add('ActionPlaces', EntityType::class, array('class' => 'MovieBundle:ActionPlace', 'choice_label'=>'locale', 'multiple' => true, 'expanded' => true))
                ->add('gender', ChoiceType::class, array('choices' => array('Male' => 'Male', 'Female' => 'Female'),'expanded' =>true))
                ->add('wellKnown', ChoiceType::class, array('choices' => array("well-known" => "well-known", "Common" => "Common", "Inglorious" => "Inglorious"), 'expanded' => true))
                ->add('brainy', ChoiceType::class, array('choices' => array('Yes' => 'yes', 'No' => 'no'),'expanded' =>true))
                ->add('file', FileType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'MovieBundle\Entity\Movies',
            
        ));
    }
   
}



