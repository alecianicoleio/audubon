<?php
/*
 * Lists all the database entries for sights.
 */
namespace Audubon;
use Audubon\Configuration\Configuration;
require_once(dirname(__FILE__).'/../vendor/autoload.php');
?>
<!DOCTYPE html>

<html>
<head>
 <link href="../main.css" rel="stylesheet" type="text/css" />
    <title>Sightings</title>
</head>


<body>
     <?php


        ini_set('display_errors','on');
        error_reporting(1);


            $config = new Configuration();
            $em = $config->getEntityManager();

            $sightings = $em->getRepository('Audubon\Sighting')->findAll();

            if(count($sightings) == 0) {
                    echo "There are no sightings.";
            } else {
                    foreach($sightings as $sighting) {
                        echo "Date: " . $sighting->getDate() . "<br>";
                        echo "Location: " . $sighting->getLocation() . "<br>";
                        echo "City: " . $sighting->getCity() . "<br>";
                        echo "State: " . $sighting->getState() . "<br>";
                        echo "Species: " . $sighting->getBird()->getSpecies() . "<br>";
                        echo "Description: " .$sighting->getBird()->getDescription() ."<br>";
                        echo "<br>";

                    }
            }

        ?>

</body>

</html>
