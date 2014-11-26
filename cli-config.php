<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Audubon\Configuration\Configuration as Configuration;

// replace with mechanism to retrieve EntityManager in your app
$configuration = new Configuration;
$entityManager = $configuration->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);