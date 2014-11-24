<?php
/*
 * Written by Megan Maher
 * The Bird Object Class
 */
include_once 'Validate.php';

class Bird {
    private $species;
    private $description;
    private $validate;

    public  function __construct() {
        $this->species = "";
        $this->description = "";
        $this->validate = new Validate();
    }

    function setSpecies($species) {
        $this->species = $species;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getSpecies() {
        return $this->species;
    }

    function getDescription() {
        return $this->description;
    }
}

?>
