<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:57 PM
 */
namespace Audubon;
use \DateTime as DateTime;
use \Exception as Exception;
class Validate {
    private $pPattern = "/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/";

    private $states = array(
          'AL',
          'AK',
          'AZ',
          'AR',
          'CA',
          'CO',
          'CT',
          'DE',
          'FL',
          'GA',
          'HI',
          'ID',
          'IL',
          'IN',
          'IA',
          'KS',
          'KY',
          'LA',
          'ME',
          'MD',
          'MA',
          'MI',
          'MN',
          'MS',
          'MO',
          'MT',
          'NE',
          'NV',
          'NH',
          'NJ',
          'NM',
          'NY',
          'NC',
          'ND',
          'OH',
          'OK',
          'OR',
          'PA',
          'RI',
          'SC',
          'SD',
          'TN',
          'TX',
          'UT',
          'VT',
          'VA',
          'WA',
          'WV',
          'WI',
          'WY'
);


    public function valDateTime($year, $month, $day, $minute, $hour){
        // Cannot be empty
        if($year == null || $month == null || $day == null || $minute == null || $hour == null) {
            return false;
        }

        $month = "" + (intval($month) + 1);

        if(intval($minute) > 59 || intval($hour) > 23)
            return false;

        $newDate = new DateTime();
        // Attempt to create the date object- if anything is invalid, DateTime() will throw an exeception
        try{
            $newDate = new DateTime($year . "-" . $month . "-" . $day);
        } catch (Exception $e){
            return false;
        }

        $currentDate = new DateTime();

        // Returns false if fail
        try{
            if(!$newDate->setTime($hour, $minute, 0)) {
                return false;
            }
        } catch(Exception $e){
            return false;
        }

        /*
      Check for a leap year
      If it's not a leap year, then Feburary 29th is not possible
      */
        $leapCheck = new DateTime($year . "-" . 2 . "-" . 29);
        $isLeap = $leapCheck->format('m') == "03";

        if($isLeap && $month==2 && $day==29)
            return false;

        // New date cannot be greater then current date
        if($newDate > $currentDate) {
            return false;
        }

        // Success
        return $newDate;
    }

    public function valLocation($location){
        if($location == null) {
            return false;
        }
        return true;
    }

    public function valCity($city){
        if($city == null) {
            return false;
        }
        return true;
    }

    public function valState($state){
        if(in_array($state, $this->states)) {
            return true;
        }
        return false;
    }

    public function valSpecies($species) {
        if($species == null) {
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
        if($description == null) {
            //If the user does not enter a required
            //description
            return false;
        }
        return true;
    }

    public function valName($name) {
        if($name == null){
            return true;
        }
        if(strlen($name) > 40) {
            return false;
        }
        return true;
    }

    public function valEmail($email) {
        if($email == null)
            return true;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function valPNumber($pNumber) {
        if($pNumber == null)
            return true;

        // convert to string
        if(preg_match($this->pPattern, $pNumber)) {
            return true;
        }
        return false;
    }
}
?>
