<?php

namespace MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="MovieBundle\Repository\UserRepository")
 */
class User {

    /**
     * @ORM\OneToMany(targetEntity="Movies", mappedBy="user", cascade={"persist"})
     * @Assert\Valid
     */
    protected $movies;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 16, minMessage =  "At least 2 characters", maxMessage = "No more then 16 characters")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

  

    public function __construct() {
        $this->movies = new ArrayCollection();
        $this->date = new \DateTime();
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
     * Set user
     *
     * @param string $user
     *
     * @return User
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return User
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    public function getMovies() {
        return $this->movies;
    }

    public function addMovie(Movies $movie) {
        $movie->setUser($this);
        $this->movies->add($movie);
    }

    public function removeMovie(Movies $movie) {
        
    }

    
}
