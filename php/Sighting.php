<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:37 PM
 */
include 'Validate.php';

class Sighting {
    private $year, $month, $day, $minute, $hour, $location, $city, $state;
    private $validate;

    public function __construct(){
        $this->date="";
        $this->time="";
        $this->location="";
        $this->city="";
        $this->state="";
        $this->validate = new Validate();
    }

    public function setDateTime($year, $month, $day, $minute, $hour){
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
        $this->minute=$minute;
        $this->hour=$hour;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTime(){
        return $this->time;
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
