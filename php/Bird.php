<?php
/*
 * Written by Megan Maher
 * The Bird Object Class
 */
namespace Audubon;

class Bird {
    private $id;
    private $species;
    private $description;
    private $validate;
    private $sightings;
    // if there is an error, we will not submit any data to the database
    private $hasErrors = false;

    public  function __construct() {
        $this->species = "";
        $this->description = "";
        $this->validate= new Validate();
    }

    function setSpecies($species) {
        if($this->validate->valSpecies($species)) {

            $this->species = $species;
            return true;
        }

        $this->hasErrors=true;
        return false;
    }

    function setDescription($description) {
        if($this->validate->valDescription($description)) {
            $this->description = $description;
            return true;
        }

        $this->hasErrors=true;
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
    public function setSighting(Sighting $sightings)
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
    public function setValidate()
    {
        $this->validate = new Validate();
    }

    /**
     * @return mixed
     */
    public function getValidate()
    {
        return $this->validate;
    }

    public function getHasErrors(){
        return $this->hasErrors;
    }
}
?>
