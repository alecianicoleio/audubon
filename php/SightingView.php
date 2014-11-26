<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 3:08 PM
 */

namespace Audubon;
use Audubon\Configuration\Configuration as Configuration;


class SightingView {
    public function printSightings(){
        $config = new Configuration();
        $em = $config->getEntityManager();

        $sightings = $em->getRepository('Audubon\Sighting')->querySightings();

        if(count($sightings)==0)
            echo "There are no sightings.";
        else{
            foreach($sightings as $sighting){
                echo "Date: " . $sighting->getDate() . "<br>";
                echo "Location: " . $sighting->getLocation() . "<br>";
                echo "City: " . $sighting->getCity() . "<br>";
                echo "State: " . $sighting->getState() . "<br>";
                echo "Species: " . $sighting->getBird()->getSpecies() . "<br>";
                echo "Description: " . $sighting->getBird()->getDescription() . "<br>";

                if($sighting->getPerson()){
                    $name = $sighting->getPerson()->getName();
                    $email = $sighting->getPerson()->getEmail();
                    $phone = $sighting->getPerson()->getPNumber();

                    if($name != "")
                        echo "Name: " . $name . "<br>";

                    if($email != "")
                        echo "Email: " . $email . "<br>";

                    if($phone != "")
                        echo "Phone: " . $phone . "<br>";

                    echo "<br>";
                }
            }
        }
    }
} 