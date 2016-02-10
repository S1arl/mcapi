<?php

namespace MovieBundle\Repository;

/**
 * EmotionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmotionRepository extends \Doctrine\ORM\EntityRepository {

    public function selectEmotions() {
        $result = $this->getEntityManager()
                ->createQuery('SELECT p.emotion FROM MovieBundle:Emotion p')
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $array = array();

        for ($i = 0; $i < count($result); $i++) {
            $array[$result[$i]['emotion']] = $result[$i]['emotion'];
        }
        return $array;
    }
    public function selectRows() {
     return   $qb = $this->createQueryBuilder('p')
                    ->select('count(p)')
                    ->getQuery()
                    ->getSingleScalarResult();
   
    }

}