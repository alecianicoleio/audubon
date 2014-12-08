<?php
require_once 'vendor/autoload.php';
use Audubon\Configuration\Configuration as Configuration;
ini_set('display_errors','on');
error_reporting(1);

$config = new Configuration();
$em = $config->getEntityManager();
$sightings = $em->getRepository('Audubon\Sighting')->findAll();

foreach ( $sightings as $sighting ) {
    $specieOptions[] = "<option value='{$sighting->getBird()->getSpecies()}'>{$sighting->getBird()->getSpecies()}</option>";
    $locationOptions[] = "<option value='{$sighting->getLocation()}'>{$sighting->getLocation()}</option>";
}

//Because locations isn't a primary key, there can have multiples, so it needs to be removed.
$locationOptions = array_unique($locationOptions);
$specieOptions = array_unique($specieOptions);
if(!empty($_GET)){
    //To load the results page
    $locationQuery = $_GET['location'];
    $speciesQuery = $_GET['species'];
    if(strlen($locationQuery) > 0 and strlen($speciesQuery) > 0){
        $bird = $em->getRepository('Audubon\Bird')->findoneby(array('species' => $speciesQuery));
        $newSightings = $em->getRepository('Audubon\Sighting')->findby(array('location' => $locationQuery, 'bird' => $bird->getID()));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="/css/sightings.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
});
</script>


    <title>Sightings</title>
</head>

<body>
    <div class="main">
        <form method="get">
                <legend class="formtitle">Sightings</legend>

            <!-- Select boxes -->
            <div>
                <label class="label">Species:</label>
                <div class="select-style">
                    <select class="species" name="species">
                        <option value="" >Select species</option>
                        <?php echo implode("\n", $specieOptions); ?>
                    </select>
                </div>
            </div>
            <div>
                <label class="label">Location:</label>
                <div class="select-style">
                    <select class="location" name="location">
                        <option value="">Select location</option>
                        <?php echo implode("\n", $locationOptions); ?>
                    </select>
                </div>
            </div>
            <!-- End Sighting Info -->

            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
    <hr>
    <results>
    <?php
        foreach ( $newSightings as $sighting ) {
            echo "Date: " . $sighting->getDate() . "<br>";
            echo "Location: " . $sighting->getLocation() . "<br>";
            echo "City: " . $sighting->getCity() . "<br>";
            echo "State: " . $sighting->getState() . "<br>";
            echo "Species: " . $sighting->getBird()->getSpecies() . "<br>";
            echo "Description: " .$sighting->getBird()->getDescription() ."<br>";
            echo "<br>";
        }
    ?>
    </results>
</body>
</html>
