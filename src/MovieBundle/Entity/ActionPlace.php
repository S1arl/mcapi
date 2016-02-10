<?php

namespace MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * ActionPlace
 *
 * @ORM\Table(name="action_place")
 * @ORM\Entity(repositoryClass="MovieBundle\Repository\ActionPlaceRepository")
 */
class ActionPlace {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="ActionPlaces")
     * @ORM\JoinColumn(name="ActionPlaces_id", referencedColumnName="id")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255)
     * 
     */
    public $locale;

 

 

    public function __toString() {
        return $this->locale;
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
     * Set locale
     *
     * @param string $locale
     *
     * @return ActionPlace
     */
    public function setLocale($locale) {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    public function setTitile($title) {
        return $this->title = $title;
    }

    public function addTitle(Movies $title) {
        if (!$this->title->contains($title)) {
            $this->title->add($title);
        }
    }




}
