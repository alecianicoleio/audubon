<?php
require_once 'vendor/autoload.php';
use Audubon\Configuration\Configuration as Configuration;

$config = new Configuration();
$em = $config->getEntityManager();
$birds = $em->getRepository('Audubon\Bird')->findAll();
$sightings = $em->getRepository('Audubon\Sighting')->findAll();

foreach ( $birds as $bird ) {
    $specieOptions[] = "<option value='{$bird->getSpecies()}'>{$bird->getSpecies()}</option>";
}
foreach ( $sightings as $sighting ) {
    $locationOptions[] = "<option value='{$sighting->getLocation()}'>{$sighting->getLocation()}</option>";
}
//Because locations isn't a primary key, there can have multiples, so it needs to be removed.
$locationOptions = array_unique($locationOptions);
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
        <form action="php/sightingSubmit.php">
                <legend class="formtitle">Sightings</legend>

            <!-- Select boxes -->
            <div>
                <label class="label">Species:</label>
                <div class="select-style">
                    <select class="species" name="species">
                        <option value="selected">Select species</option>
                        <?php echo implode("\n", $specieOptions); ?>
                    </select>
                </div>
            </div>
            <div>
                <label class="label">Location:</label>
                <div class="select-style">
                    <select class="location" name="location">
                        <option value="selected">Select location</option>
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

    ?>
    </results>
</body>
</html>
