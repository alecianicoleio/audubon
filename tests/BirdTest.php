<?php
/**
 * Class BirdTest
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 11/25/14
 */

namespace Audubon;
use Audubon\Configuration\Configuration as Configuration;

class BirdTest extends \PHPUnit_Framework_TestCase{

    protected $bird;
    protected $em;

    protected function setUp(){
        $this->bird = new Bird();
        $config = new Configuration();
        $this->em = $config->getEntityManager();
    }

    // Test 1
    public function testSetSpecies(){
        // should return true
        $this->assertTrue($this->bird->setSpecies("Bird",$this->em));
        $this->assertTrue($this->bird->setSpecies("Big bird",$this->em));
        $this->assertTrue($this->bird->setSpecies("Penguin",$this->em));

        // should return false (it cannot be null)
        $this->assertFalse($this->bird->setSpecies("",$this->em));

        // should return false (cannot contain a number)
        $this->assertFalse($this->bird->setSpecies("9Bird",$this->em));
        $this->assertFalse($this->bird->setSpecies("Bird9",$this->em));
        $this->assertFalse($this->bird->setSpecies("B9rd",$this->em));
        $this->assertFalse($this->bird->setSpecies("B99rd",$this->em));
        $this->assertFalse($this->bird->setSpecies("9Bird9",$this->em));
        $this->assertFalse($this->bird->setSpecies(999,$this->em));
    }

    // Test 2
    public function testSetDescription(){
        // should return true
        $this->assertTrue($this->bird->setDescription("Tasty bird"));
        $this->assertTrue($this->bird->setDescription("Yellow bird"));
        $this->assertTrue($this->bird->setDescription("Bird owns 45 houses."));

        // should return false (it cannot be null)
        $this->assertFalse($this->bird->setDescription(""));
    }

} 