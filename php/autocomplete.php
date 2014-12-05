<?php
/**
 * User: Lawrence O'Boyle   lawrence@40visuals.com
 * Date: 12/03/14
 */

namespace Audubon;
require_once '../vendor/autoload.php';
use Audubon\Configuration\Configuration as Configuration;

// prevent direct access
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
    $user_error = 'Access denied - not an AJAX request...';
    trigger_error($user_error, E_USER_ERROR);
}

// get what user typed in autocomplete input
$term = trim($_GET['query']);

$a_json_row = array();

$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);

// replace multiple spaces with one
$term = preg_replace('/\s+/', ' ', $term);

// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
    print $json_invalid;
    exit;
}
// *****************************************************************************

$config = new Configuration();
$em = $config->getEntityManager();
$birds = $em->getRepository('Audubon\Bird')->findAll();
$a_json = array();

foreach($birds as $bird){
    array_push($a_json, $bird->getSpecies());
}

$json = json_encode(array("query" => "Unit",
                          "suggestions" => $a_json));
print $json;
?>
