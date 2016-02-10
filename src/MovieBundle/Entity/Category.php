<?php

namespace MovieBundle\Entity;

class Category {

    private $gender;
    private $emotions;
    private $actionPlace;
    private $actionYear;
    private $brainy;

    public function setEmotions($emotions) {
        $this->emotions = $emotions;
        return $this;
    }

    public function getEmotions() {
        return $this->emotions;
    }

    public function setActionPlace($actionPlace) {
        $this->actionPlace = $actionPlace;


        return $this;
    }

    public function getActionYear() {
        return $this->actionYear;
    }

    public function setActionYear($actionYear) {
        $this->actionYear = $actionYear;


        return $this;
    }

    public function getActionPlace() {
        return $this->actionPlace;
    }

    public function setGender($gender) {
        $this->gender = $gender;
        return $gender;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setBrainy($brainy) {
        $this->brainy = $brainy;
        return $brainy;
    }

    public function getBrainy() {
        return $this->brainy;
    }

}
