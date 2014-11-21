<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:57 PM
 */

class Validate {
    $pattern = "^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$"
    public function __construct(){

    }

    public function valDateTime($date, $minute, $hour){

    }

    public function valLocation($location){

    }

    public function valCity($city){

    }

    public function valState($state){

    }

    public function valSpecies($species) {

    }

    public function valDescription($description) {

    }

    public function valName($name) {
        if(strlen($name) < 1 && strlen($name) > 40):
            return 7;
        endif
    }

    public function valEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            return 8;
        endif
    }

    public function valPNumberr($pNumber) {
        if(preg_match($pattern, $pNumber)):
            return 0
        endif
        return 9
    }
}





?>
