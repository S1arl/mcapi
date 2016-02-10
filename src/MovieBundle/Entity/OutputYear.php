<?php

namespace MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OutputYear
 *
 * @ORM\Table(name="output_year")
 * @ORM\Entity(repositoryClass="MovieBundle\Repository\OutputYearRepository")
 */
class OutputYear {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string")
     */
    private $year;

    public function __toString() {
        return $this->year;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return OutputYear
     */
    public function setYear($year) {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear() {
        return $this->year;
    }

}
