<?php
/**
 * Class TestCase
 *
 * Base test case class.
 *
 * @author Joshua Walker
 * @version 11/26/14
 */
namespace Audubon;
use Audubon\Configuration\Configuration;


class TestCase extends \PHPUnit_Framework_TestCase{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    private $config;

    protected function setUp(){
        //set up test database thing..
        //create whole new databse with no data.
        $this->config = new Configuration('testing');
        $this->em = $this->config->getEntityManager();
        $this->configure();
    }

    private function configure(){
        $db = $this->config->getDB();
        $connection = $this->em->getConnection();
        $connection->executeQuery("DROP DATABASE IF EXISTS `{$db['testdbname']}`");
        $connection->executeQuery("CREATE DATABASE IF NOT EXISTS `{$db['testdbname']}`");
        $connection->executeQuery("USE {$db['testdbname']}");
        //
        $this->createSchema();
    }

    private function createSchema(){
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
        $metaData = $this->em->getMetaDataFactory()->getAllMetadata();
        $sqlToRun = $schemaTool->getUpdateSchemaSql($metaData,false);
        if(!count($sqlToRun))
            return false;

        $schemaTool->updateSchema($metaData);
    }

    protected function tearDown(){

    }
} 