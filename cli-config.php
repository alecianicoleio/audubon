<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Audubon\Configuration\Configuration as Configuration;

// replace with file to your own project bootstrap
require_once 'config/bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$configuration = new Configuration;
$entityManager = $configuration->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);