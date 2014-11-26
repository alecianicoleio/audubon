<?php
namespace Audubon\Configuration;
require_once(dirname(__FILE__).'/../vendor/autoload.php');
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Configuration{

    private $em;
    private $environment;
    private $db;

    public function __construct($environment='development'){
        $this->environment = $environment;
        $this->doctrineSetup();

    }

    public function doctrineSetup(){
        $paths = array('../php');
        $isDevMode = false;
        $dbParams = $this->getDatabaseConfiguration();
        $config = Setup::createYAMLMetadataConfiguration($paths,$dbParams);
        $driver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(array(dirname(__FILE__).'/../persistance'));
        $config->setMetadataDriverImpl($driver);
        $this->em = EntityManager::create($dbParams,$config);

    }

    public function getDatabaseConfiguration(){
        $db = array(
            'driver'    =>  'pdo_mysql',
            'user'      =>  'root',
            'password'  =>  '',
            'dbname'    =>  $this->environment == 'development' ? 'audubon' : 'audubonTesting',
            'host'      =>  'localhost'
        );


        /**
         * To create edit the way your database connects, create a new file called "local.php" in this same directory...
         * copy the
         * following code into it, and put in your actual password. The rest should take care of itself...

        $local = array(
            'password'  =>  'PASSWORD HERE',
        );

        $dbParams = array_replace($db,$local);
         */

        if (file_exists(dirname(__FILE__) . '/local.php')) {
            include dirname(__FILE__) . '/local.php';
        }
        //die(var_dump($dbParams));
        $this->db = $db;
        return $db;
    }

    public function getDB(){
        return $this->db;
    }

    /**
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager(){
        return $this->em;
    }
}

