<?php

namespace Audubon\Entities;

class Sighting {
    
    /**
     * integer
     */
    private $id;
    /**
     * datetime
     */
    private $date;
    /**
     * string
     */
    private $location;
    /**
     * Person
     */
    private $person;
    /**
     * Bird
     */
    private $bird;


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
    public function getDate(){
        return $this->date;
    }
    /**
     * @param mixed $date
     */
    public function setDate($date){
        $this->date = $date;
    }


    /**
     * @return mixed
     */
    public function getLocation(){
        return $this->location;
    }
    /**
     * @param mixed $location
     */
    public function setLocation($location){
        $this->location = $location;
    }


    /**
     * @return Person
     */
    public function getPerson(){
        return $this->person;
    }
    /**
     * @param mixed $location
     */
    public function setPerson($person){
        $this->person = $person;
    }


    /**
     * @return Bird
     */
    public function getBird(){
        return $this->bird;
    }
    /**
     * @param mixed $location
     */
    public function setBird($bird){
        $this->bird = $bird;
    }



}

