<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:57 PM
 */

class Validate {
    private $pPattern = "^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$";

    public function valDateTime($date, $minute, $hour){
        return true;
    }

    public function valLocation($location){
        return true;
    }

    public function valCity($city){
        return true;
    }

    public function valState($state){
        return true;
    }

    public function valSpecies($species) {
        if(strlen($species) < 1) {
            //If the user does not enter a bird species
            return false;
        }

        if(preg_match('/d/', $species)) {
            //if the string contains a number, it is not
            //a proper bird species
            return false;
        }
        return true;
    }

    public function valDescription($description) {
        if(strlen($description) < 1) {
            //If the user does not enter a required
            //description
            return false;
        }
        return true;
    }

    public function valName($name) {
        if(strlen($name) < 0 || strlen($name) > 40) {
            return false;
        }
        return true;
    }

    public function valEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function valPNumber($pNumber) {
        if(preg_match($this->pattern, $pNumber)) {
            return true;
        }
        return false;
    }
}
?>
