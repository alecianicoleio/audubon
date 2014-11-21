<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:37 PM
 */

class Sighting {
    private $date, $time, $location, $city, $state;

    public function __construct(){
        $this->date="";
        $this->time="";
        $this->location="";
        $this->city="";
        $this->state="";
    }

    public function setDate($date){
        $this->date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setTime($time){
        $this->time=$time;
    }

    public function getTime(){
        return $this->$time;
    }

    public function setLocation($location){
        $this->location=$location;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setCity($city){
        $this->city=$city;
    }

    public function getCity(){
        return $this->city;
    }

    public function setState($state){
        $this->state=$state;
    }

    public function getState(){
        return $this->state;
    }
} 