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
        if($this->validate->valSpecies($species)) {
            $this->species = $species;
            return true;
        }
        return false;
    }

    function setDescription($description) {
        if($this->validate->valDescription($description)) {
            $this->description = $description;
            return true;
        }
        return false;
    }

    function getSpecies() {
        return $this->species;
    }

    function getDescription() {
        return $this->description;
    }
}

?>
