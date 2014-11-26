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
    // check if object should be submitted to the database (don't submit on duplicate)
    private $checkSubmit = true;

    public  function __construct() {
        $this->species = "";
        $this->description = "";
        $this->validate = new Validate();
    }

    function setSpecies($species,$em) {
        if($this->validate->valSpecies($species)) {
            // Species is unique, thus only submit if species doesn't exist in the database
            if($em->getRepository('Audubon\Bird')->speciesExists($species)){
                $this->checkSubmit=false;
                return false;
            }

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

    public function getHasErrors(){
        return $this->hasErrors;
    }

    public function getCheckSubmit(){
        return $this->checkSubmit;
    }
}
?>
