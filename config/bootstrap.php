<?php

require_once(dirname(__FILE__).'/../vendor/autoload.php');

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array('../php');
$isDevMode = false;

$dbParams = array(
    'driver'    =>  'pdo_mysql',
    'user'      =>  'root',
    'password'  =>  '',
    'dbName'    =>  'audubon'
);


/**
 * To create edit the way your database connects, create a new file called "local.php" in this same directory...
 * copy the
 * following code into it, and put in your actual password. The rest should take care of itself...

 $localDbParams = array(
    'driver'    =>  'pdo_mysql',
    'user'      =>  'root',
    'password'  =>  'PASSWORD HERE',
    'dbName'    =>  'audubon'
);

$dbParams = $dbParams + $localDbParams;
 */

if (file_exists(dirname(__FILE__) . '/local.php')) {
    include dirname(__FILE__) . '/local.php';
}

$config = Setup::createYAMLMetadataConfiguration($paths,$dbParams);
$driver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(array(dirname(__FILE__).'/../persistance'));
$config->setMetadataDriverImpl($driver);
$em = EntityManager::create($dbParams,$config);
