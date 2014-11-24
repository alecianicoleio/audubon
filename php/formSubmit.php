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
    print_r("BEGIN submit()<br>");
    // Person
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $person = new Person();
    var_dump($person->setEmail($email));
    echo "<br>";
    var_dump($person->setName($name));
    echo "<br>";
    var_dump($person->setPNumber($phone));
    echo "<br>";

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
    $description = $_POST['desc'];
    echo "<br>";
    var_dump($description);

    $bird = new Bird();
    var_dump($bird->setDescription($description));
    echo "<br>";
    var_dump($bird->setSpecies($species));
    echo "<br>END submit()";
}
?>
