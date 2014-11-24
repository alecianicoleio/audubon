<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:56 PM
 */
include 'Sighting.php';
include 'Person.php';
include 'Bird.php';
ini_set('display_errors','on');
error_reporting(1);
submit();

function submit(){
    echo "BEGIN submit()";
    // Person
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $person = new Person();
    $person->setEmail($email);
    $person->setName($name);
    $person->setPNumber($phone);

    // Sighting
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $minute = $_POST['minute'];
    $hour = $_POST['hour'];
    $location = $_POST['location'];
    $city = $_POST['city'];
    $state = $_POST['states'];

    $sighting = new Sighting();
    $sighting->setDateTime($year, $month, $day, $minute, $hour);
    $sighting->setLocation($location);
    $sighting->setCity($city);
    $sighting->setState($state);

    // Bird
    $species = $_POST['species'];
    $description = $_POST['description'];

    $bird = new Bird();
    $bird->setDescription($description);
    $bird->setSpecies($species);
    echo "<br>END submit()";
}
?>
