<?php

namespace Audubon\Entities;

class Bird {
    
    /**
     * integer
     */
    private $id;
    /**
     * string
     */
    private $species;
    /**
     * string
     */
    private $description;
    /**
     * Sighting[]
     */
    private $sightings;


    /**
     * @return mixed
     */
    public function getID(){
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setID($id){
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getSpecies(){
        return $this->species;
    }
    /**
     * @param mixed $species
     */
    public function setSpecies($species){
        $this->species = $species;
    }


    /**
     * @return mixed
     */
    public function getDescription(){
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription($description){
        $this->description = $description;
    }    


    /**
     * @return Sighting[]
     */
    public function getSightings(){
        return $this->sightings;
    }
    /**
     * @param mixed $sightings
     */
    public function setSightings($sightings){
        $this->sightings = $sightings;
    }  

}

