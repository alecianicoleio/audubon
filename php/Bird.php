<?php
/*
 * Written by Megan Maher
 * The Bird Object Class
 */
class Bird {
    private $species;
    private $description;

    public  function __construct() {
        $this->species = "";
        $this->description = "";
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
