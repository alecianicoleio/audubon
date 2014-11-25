<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:37 PM
 */
include_once 'Validate.php';
include_once 'Person.php';

class Sighting {
    private $id;
    private $date;
    private $location;
    private $city;
    private $state;
    private $person;
    private $bird;
    private $validate;

    public function __construct(){
        $this->date="";
        $this->location="";
        $this->city="";
        $this->state="";
        $this->validate = new Validate();
    }

    public function setDateTime($year, $month, $day, $minute, $hour){
        // $date will be a DateTime object or false if there is an error
        $date = $this->validate->valDateTime($year, $month, $day, $minute, $hour);

        // if $date is not false, then it is a valid DateTime object
        if($date)
            $this->date = $date;
    }

    public function getDate(){
        return $this->date->format('Y-m-d H:i:s');
    }

    public function setLocation($location){
        if($this->validate->valLocation($location))
            $this->location=$location;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setCity($city){
        if($this->validate->valCity($city))
            $this->city=$city;
    }

    public function getCity(){
        return $this->city;
    }

    public function setState($state){
        if($this->validate->valState($state))
            $this->state=$state;
    }

    public function getState(){
        return $this->state;
    }

    /**
     * @param Bird $bird
     */
    public function setBird(Bird $bird)
    {
        $this->bird = $bird;
    }

    /**
     * @return Bird
     */
    public function getBird()
    {
        return $this->bird;
    }

    public function setPerson(Person $person){
        $this->person = $person;
    }

    public function getPerson(){
        return $this->person;
    }
<<<<<<< HEAD
}
=======

    public function setBird(Bird $bird){
        $this->bird=$bird;
    }

    public function getBird(){
        return $this->bird;
    }
}
?>
>>>>>>> f1a2dfa35c5acc96db293a8a845ca0c9e2e32b12
