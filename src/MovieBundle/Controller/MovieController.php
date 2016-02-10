<?php

namespace MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MovieBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use MovieBundle\Entity\Category;

class MovieController extends Controller {

    public function indexAction(Request $request) {
        $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();
        $actionPlace = $em->getRepository('MovieBundle:ActionPlace')->selectLocale();
        $emotions = $em->getRepository('MovieBundle:Emotion')->selectEmotions();
        $brainy = $em->getRepository('MovieBundle:Movies')->selectBrainy();
        $scalarEmotion = $em->getRepository('MovieBundle:Emotion')->selectRows();
        


        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category, array('action_place' => $actionPlace, 'emotions' => $emotions));
        $form->handleRequest($request);
        if ($form->isValid()) {
            $session->set('Action', $category->getActionPlace());
            $session->set('Year', $category->getActionYear());
            $session->set('Emotions', $category->getEmotions());
            $session->set('gender', $category->getGender());
            $session->set('brainy', $category->getBrainy());
            return $this->redirectToRoute('movie_category');
        }
        return $this->render('MovieBundle:Movie:index.html.twig', array('form' => $form->createView(), 'brainy' => $brainy, 'emotionRows' => $scalarEmotion, 'brainy' => $brainy));
    }

    public function categoryAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
            
      
        if ($session->get('Year') === null) {
            return $this->redirectToRoute('movie_homepage');
        }
        if ($request->query->get('page') == null) {
            $page = 1;
            $offset = 0;
        } else {
            $page = $request->query->get('page');
            $offset = 25 * ($page - 1);
        }
        $total = $em->getRepository('MovieBundle:Movies')->selecLastId($session->get('Year'), $session->get('gender'), $session->get('brainy'), $session->get('Emotions'), $session->get('Action'));

        $totalPages = ceil($total / 25);
        $category = $em->getRepository('MovieBundle:Movies')->selectCategory($session->get('Year'), $session->get('gender'), $session->get('brainy'), $session->get('Emotions'), $session->get('Action'), $offset);
        return $this->render('MovieBundle:Movie:category.html.twig', array('category' => $category, 'page' => $page, 'totalPages' => $totalPages));
    }

    public function movieAction(Request $request, $slug, $id) {

        $repository = $this->getDoctrine()
                ->getRepository('MovieBundle:Movies');
        $query = $repository->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->andWhere('p.title LIKE :title')
                ->setParameter('title', $slug)
                ->getQuery();
        $movie = $query->getResult();
        return $this->render('MovieBundle:Movie:movie.html.twig', array('item' => $movie));
    }

    public function aboutAction() {
        return $this->render('MovieBundle:Movie:about.html.twig');
    }

}
