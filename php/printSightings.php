<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 2:49 PM
 */

require_once(dirname(__FILE__).'/../vendor/autoload.php');
ini_set('display_errors','on');
error_reporting(1);
?>
<!DOCTYPE html>

<html>
<head>
    <link href="../main.css" rel="stylesheet" type="text/css" />

    <title>Sightings</title>

</head>

<body>
    <div class="main">
        <?php
        $sightingView = new Audubon\SightingView();
        $sightingView->printSightings();
        ?>
    </div>
</body>
</html>