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
        //create whole new database with no data.
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

    // Setup data for test cases that query the database with species
    protected function speciesDataSetup(){
        $bird1 = new Bird();
        $bird1->setSpecies("turkey",$this->em);
        $bird1->setDescription("yummy");

        $bird2 = new Bird();
        $bird2->setSpecies("penguin",$this->em);
        $bird2->setDescription("always formal");

        $bird3 = new Bird();
        $bird3->setSpecies("chicken", $this->em);
        $bird3->setDescription("tastes like everything");

        $this->em->persist($bird1);
        $this->em->persist($bird2);
        $this->em->persist($bird3);
        $this->em->flush();
    }

    // Setup data for test cases that query the database with email
    protected function emailDataSetup(){
        $person1 = new Person();
        $person1->setName("pete");
        $person1->setPNumber("919-919-9919");
        $person1->setEmail("pete@pete.com",$this->em);

        $person2 = new Person();
        $person2->setName("shrimp");
        $person2->setPNumber("919-919-9919");
        $person2->setEmail("definatly@best.com",$this->em);

        $person3 = new Person();
        $person3->setName("pizza");
        $person3->setPNumber("919-919-9919");
        $person3->setEmail("pizza@yummy.edu",$this->em);

        $this->em->persist($person1);
        $this->em->persist($person2);
        $this->em->persist($person3);
        $this->em->flush();
    }
} 