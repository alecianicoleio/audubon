<?php
/*
 * Written by Megan Maher
 * The Bird Object Class
 */
include_once 'Validate.php';

class Bird {
    private $id;
    private $species;
    private $description;
    private $validate;
    private $sightings;

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

    /**
     * @param mixed $sightings
     */
    public function setSightings($sightings)
    {
        $this->sightings = $sightings;
    }

    /**
     * @return mixed
     */
    public function getSightings()
    {
        return $this->sightings;
    }

    /**
     * @param mixed $validate
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;
    }

    /**
     * @return mixed
     */
    public function getValidate()
    {
        return $this->validate;
    }
}
?>
