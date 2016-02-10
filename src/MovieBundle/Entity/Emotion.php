<?php

namespace MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Symfony\Component\Validator\Constraints as Assert;


/**
 * Emotion
 *
 * @ORM\Table(name="emotion")
 * @ORM\Entity(repositoryClass="MovieBundle\Repository\EmotionRepository")
 * 
 */
class Emotion {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="emotions")
     * @ORM\JoinColumn(name="emotion_id", referencedColumnName="id")
     * 
     * 
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Emotion", type="string")
     * 
     */
    public $emotion;

  
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set emotion
     *
     * @param string $emotion
     *
     * @return Emotion
     */
    public function setEmotions($emotion) {
        $this->emotion = $emotion;

        return $this;
    }

    /**
     * Get emotion
     *
     * @return string
     */
    public function getEmotions() {
        return $this->emotion;
    }

    public function setTitle($title) {
        return $this->title = $title;
    }

    public function addTitle(Movies $title) {
        if (!$this->title->contains($title)) {
            $this->title->add($title);
        }
    }

  
}
