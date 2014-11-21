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

        // Sighting
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        // Bird
        $species = $_POST['species'];
        $desc = $_POST['desc'];
    }

?>