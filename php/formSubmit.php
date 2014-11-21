<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:56 PM
 */

    submit();

    function submit(){
        // Person
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $person = new Person();
        $person->setEmail($email);
        $person->setName($name);
        $person->setPNumber($phone);

        // Sighting
        $date = $_POST['date'];
        $minute = $_POST['minute'];
        $hour = $_POST['hour'];
        $location = $_POST['location'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        $sighting = new Sighting();
        $sighting->setDateTime($date, $minute, $hour);
        $sighting->setLocation($location);
        $sighting->setCity($city);
        $sighting->setState($state);

        // End Sighting

        // Bird
        $species = $_POST['species'];
        $desc = $_POST['desc'];

        $bird = new Bird();
        $bird->setDescription($desc);
        $bird->setSpecies($species);
    }

?>