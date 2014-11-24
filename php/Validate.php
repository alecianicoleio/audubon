<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:57 PM
 */

class Validate {
    private $pPattern = "/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/";

    private $states = array(
    'Alabama',
    'Alaska',
    'Arizona',
    'Arkansas',
    'California',
    'Colorado',
    'Connecticut',
    'Delaware',
    'District of Columbia',
    'Florida',
    'Georgia',
    'Hawaii',
    'Idaho',
    'Illinois',
    'Indiana',
    'Iowa',
    'Kansas',
    'Kentucky',
    'Louisiana',
    'Maine',
    'Maryland',
    'Massachusetts',
    'Michigan',
    'Minnesota',
    'Mississippi',
    'Missouri',
    'Montana',
    'Nebraska',
    'Nevada',
    'New Hampshire',
    'New Jersey',
    'New Mexico',
    'New York',
    'North Carolina',
    'North Dakota',
    'Ohio',
    'Oklahoma',
    'Oregon',
    'Pennsylvania',
    'Rhode Island',
    'South Carolina',
    'South Dakota',
    'Tennessee',
    'Texas',
    'Utah',
    'Vermont',
    'Virginia',
    'Washington',
    'West Virginia',
    'Wisconsin',
    'Wyoming'
);

    public function valDateTime($year, $month, $day, $minute, $hour){
        $currentDate = new DateTime('Y-m-d H:i:s');
        $newDate = new DateTime($year .'-'.$month.'-'.$day.' '.$hour.':'.$minute.':0');
        if($newDate > $currentDate){
            return false;
        }
        return true;
    }

    public function valLocation($location){
        if(strlen($location) < 1) {
            return false;
        }
        return true;
    }

    public function valCity($city){
        if(strlen($city) < 1) {
            return false;
        }
        return true;
    }

    public function valState($state){
        if(in_array($state, $this->states)) {
            return false;
        }
        return true;
    }

    public function valSpecies($species) {
        if(strlen($species) < 1) {
            //If the user does not enter a bird species
            return false;
        }

        if(preg_match('/\d/', $species)) {
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
        if(preg_match($this->pPattern, $pNumber)) {
            return true;
        }
        return false;
    }
}
?>
