<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 5:31 PM
 */
include_once 'Validate.php';
include_once 'Sighting.php';
ini_set('display_errors','on');
error_reporting(1);
echo "hi";
$val = new Validate();

$sighting = new Sighting();

// $year, $month, $day, $minute, $hour
try{
    $sighting->setDateTime("2010", "5", "u", "5", "5");
    echo "pass";
} catch(Exception $e){
    echo "fail";
    exit(1);
}


?>