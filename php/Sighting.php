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

    private $date, $location, $city, $state, $person,$bird;
    private $validate;

    public function __construct(){
        $this->date="";
        $this->location="";
        $this->city="";
        $this->state="";
        $this->validate = new Validate();
    }

    public function setDateTime($year, $month, $day, $minute, $hour){
        try{
            $this->date = $this->validate->valDateTime($year, $month, $day, $minute, $hour);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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
    public function setBird($bird)
    {
        $this->bird = $bird;
    }

    /**
     * @return Bird
     */
    public function getBird()
    {
        return $this->bird;

    public function setPerson($person){
        $this->person = $person;
    }

    public function getPerson(){
        return $this->person;
    }
}
?>
