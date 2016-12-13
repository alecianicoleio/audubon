<?php

namespace Audubon\Entities;

class Person {
    
    /**
     * integer
     */
    private $id;
    /**
     * string
     */
    private $first;
    /**
     * string
     */
    private $last;
    /**
     * string
     */
    private $phone;
    /**
     * string
     */
    private $email;
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
    public function getFirst(){
        return $this->first;
    }
    /**
     * @param mixed $first
     */
    public function setFirst($first){
        $this->first = $first;
    }


    /**
     * @return mixed
     */
    public function getLast(){
        return $this->last;
    }
    /**
     * @param mixed $last
     */
    public function setLast($last){
        $this->last = $last;
    }


    /**
     * @return mixed
     */
    public function getPhone(){
        return $this->phone;
    }
    /**
     * @param mixed $phone
     */
    public function setPhone($phone){
        $this->phone = $phone;
    }


    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email){
        $this->email = $email;
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

