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

        // Sighting object needs to be created earlier then the rest of sighting's code, because the setting of person
        // and bird fields depend on person's/bird's code
        $sighting = new Sighting();

        // Person
        $name = $form['name'];
        $email = $form['email'];
        $phone = $form['phone'];

        // if person exists in database, return object, else return false
        $person = $em->getRepository('Audubon\Person')->emailExists($email);

        // if false, then person does not exist, thus create new person
        if(!$person){
            $person = new Person();
            $person->setEmail($email);
        }
        else
            // the validate field doesn't get correctly setup on the object returned from the database call, thus this line is required
            $person->setValidate();

        // Set/update person fields
        $person->setName($name);
        $person->setPNumber($phone);

        // If there was an error raised during the creation of the class, then don't submit data
        if($person->getHasErrors()){
            return "Person inputs contain an error";
        }

        // Person is optional, so only submit data if an input was provided.
        if($person->getEmail()!=null || $person->getPNumber()!=null || $person->getName()!=null){
            // Prepare $person for submission to database
            $em->persist($person);
            $sighting->setPerson($person);
        }
        else
            $sighting->setPerson(null);

        // Bird
        $species = $form['species'];
        $description = $form['desc'];

        // if species exists return object, else return false
        $bird = $em->getRepository('Audubon\Bird')->speciesExists($species);

        // if false, bird does not exist, thus create a new bird object
        if(!$bird){
            $bird = new Bird();
            $bird->setSpecies($species);
        }
        else
            // the validate field doesn't get correctly setup on the object returned from the database call, thus this line is required
            $bird->setValidate();

        // Set description for new object or update for existing object
        $bird->setDescription($description);

        // An error occur, thus stop form submission
        if($bird->getHasErrors()){
            return "Bird inputs contain an error";
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

        $sighting->setDateTime($year, $month, $day, $minute, $hour);
        $sighting->setLocation($location);
        $sighting->setCity($city);
        $sighting->setState($state);
        $sighting->setBird($bird);

        if($sighting->getHasErrors()){
            return "Sighting inputs contain an error";
        }

        // Prepare $sighting for submission to database
        $em->persist($sighting);

        // Submit persisted data to the database
        $em->flush();

        return "Submission Successful";

    }
} 