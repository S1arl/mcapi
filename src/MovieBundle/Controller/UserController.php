<?php

namespace MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MovieBundle\Entity\User;
use MovieBundle\Form\UserType;
use MovieBundle\Entity\ActionPlace;
use MovieBundle\Entity\Emotion;
use MovieBundle\Entity\ActionYear;
use MovieBundle\Form\ActionPlace\ActionPlaceAddType;
use MovieBundle\Form\ActionPlace\ActionPlaceType;
use MovieBundle\Form\Emotion\EmotionType;
use MovieBundle\Form\Emotion\EmotionAddType;
use MovieBundle\Form\ActionYear\ActionYearType;
use MovieBundle\Form\ActionYear\ActionYearAddType;
use Doctrine\Common\Collections\ArrayCollection;

class UserController extends Controller {

    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $originalTags = new ArrayCollection();
        foreach ($user->getMovies() as $movie) {
            $originalTags->add($movie);
        }
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isValid()) {
            
            foreach ($originalTags as $movie) {
                        
                if (false === $user->getMovies()->contains($movie)) {
                    $em->persist($movie);
                }
                
            }
            $em->persist($user);
            
            $em->flush();
            return $this->redirectToRoute('movie_homepage');
        }
        return $this->render('MovieBundle:User:addMovie.html.twig', array('form' => $form->createView()));
    }

    public function modifyFormAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $actionPlace = new ActionPlace();
        $actionYear = new ActionYear();
        $emotion = new Emotion();
        $form = $this->createForm(ActionPlaceType::class, $actionPlace);
        $form2 = $this->createForm(ActionPlaceAddType::class, $actionPlace);
        $form3 = $this->createForm(EmotionType::class, $emotion);
        $form4 = $this->createForm(EmotionAddType::class, $emotion);
        $form5 = $this->createForm(ActionYearType::class, $actionYear);
        $form6 = $this->createForm(ActionYearAddType::class, $actionYear);
        $form->handleRequest($request); // DELETE Place from ACTION PLACe
        $form2->handleRequest($request); // ADD new PLace to ACTION PLACE
        $form3->handleRequest($request); // REMOVE emotion from EMOTION
        $form4->handleRequest($request); // ADD NEW EMOTION TO EMOTION ENTITY
        $form5->handleRequest($request); // REMOVE actionYear from ACTION YEAR
        $form6->handleRequest($request); // ADD actionyear to ACTION YEAR  ENTITY
        if ($form->isValid()) {
            $actionPlace->getLocale();
            $em->remove($actionPlace->getLocale());
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        } elseif ($form2->isValid()) {
            $em->persist($actionPlace);
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        } elseif ($form3->isValid()) {
            $em->remove($emotion->getEmotions());
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        } elseif ($form4->isValid()) {
            $em->persist($emotion);
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        } elseif ($form5->isValid()) {
            $em->remove($actionYear->getYear());
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        }
        elseif($form6->isValid()) {
            $em->persist($actionYear);
            $em->flush();
            return $this->redirectToRoute('movie_addMovie');
        }

        return $this->render('MovieBundle:User:modifyForm.html.twig', array('form' => $form->createView(),
                    'form2' => $form2->createView(),
                    'form3' => $form3->createView(),
                    'form4' => $form4->createView(),
                    'form5' => $form5->createView(),
                     'form6' => $form6->createView(),
        ));
    }
}
