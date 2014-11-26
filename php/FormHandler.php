<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 8:54 AM
 */

namespace Audubon;
use Audubon\Configuration\Configuration as Configuration;

class FormHandler {

    public function processForm($form){
        $config = new Configuration();
        $em = $config->getEntityManager();

        // Person
        $name = $form['name'];
        $email = $form['email'];
        $phone = $form['phone'];

        $person = new Person();
        $person->setEmail($email);
        $person->setName($name);
        $person->setPNumber($phone);

        // If there was an error raised during the creation of the class, then don't submit data
        if($person->getHasErrors()){
            echo "Person inputs contain an error";
            return;
        }

        // Person is optional, so only submit data if an input was provided
        if($person->getEmail()!="" && $person->getPNumber()!="" && $person->getName()!=""){
            // Prepare $person for submission to database
            $em->persist($person);
        }

        // Bird
        $species = $form['species'];
        $description = $form['desc'];

        $bird = new Bird();
        $bird->setDescription($description);
        $bird->setSpecies($species);

        if($bird->getHasErrors()){
            echo "Bird inputs contain an error";
            return;
        }

        // Prepare $bird for submission to database
        $em->persist($bird);

        // Sighting
        $year = $form['year'];
        $month = $form['month'];
        $day = $form['day'];
        $minute = $form['minute'];
        $hour = $form['hour'];
        $location = $form['location'];
        $city = $form['city'];
        $state = $form['states'];

        $sighting = new Sighting();
        $sighting->setDateTime($year, $month, $day, $minute, $hour);
        $sighting->setLocation($location);
        $sighting->setCity($city);
        $sighting->setState($state);
        $sighting->setPerson($person);
        $sighting->setBird($bird);

        if($sighting->getHasErrors()){
            echo "Sighting inputs contain an error";
            return;
        }

        // Prepare $sighting for submission to database
        $em->persist($sighting);

        // Submit persisted data to the database
        $em->flush();

        echo 'saved...';

    }
} 