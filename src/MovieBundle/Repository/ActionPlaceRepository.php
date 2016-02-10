<?php

namespace MovieBundle\Repository;

/**
 * ActionPlaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActionPlaceRepository extends \Doctrine\ORM\EntityRepository {

    public function selectLocale() {

        $result = $this->getEntityManager()
                ->createQuery('SELECT p.locale FROM MovieBundle:ActionPlace p ORDER BY p.locale ASC')
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        $array = array();
        for ($i = 0; $i < count($result); $i++) {
            $array[$result[$i]['locale']] = $result[$i]['locale'];
        }
        return $array;
    }

}
