<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 1:56 PM
 */

require_once(dirname(__FILE__).'/../vendor/autoload.php');
ini_set('display_errors','on');
error_reporting(1);
$formHandler = new Audubon\FormHandler();
echo $formHandler->processForm($_POST);
?>
