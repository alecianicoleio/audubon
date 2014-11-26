<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/25/14
 * Time: 3:25 PM
 */

namespace Audubon;
use Audubon\Configuration\Configuration as Configuration;

class PersonTest extends TestCase{
    protected $person;
    protected $em;

    protected function setUp(){
        parent::setUp();
        $this->person = new Person();
        $config = new Configuration();
        $this->em = $config->getEntityManager();
    }

    // Test 1
    public function testValName(){
        // should return true
        $this->assertTrue($this->person->setName("Pete"));
        $this->assertTrue($this->person->setName("Pete'n'Cool"));
        $this->assertTrue($this->person->setName("topdog52"));
        $this->assertTrue($this->person->setName(555));

        // should return false (it cannot be null)
        $this->assertFalse($this->person->setName(""));

        // should return false (can't be greater then 40 chars)
        $this->assertFalse($this->person->setName("klninedkallnknklnlkklajenalknklnlknckldninfailnklnavnelanlnieie904nnknionane4"));
    }

    // Test 2
    public function testValEmail(){
        // should return true
        $this->assertTrue($this->person->setEmail("pete@pete.com",$this->em));
        $this->assertTrue($this->person->setEmail("b@b.edu",$this->em));
        $this->assertTrue($this->person->setEmail("b42@bloop.net",$this->em));
        $this->assertTrue($this->person->setEmail("b42@blo42op.net",$this->em));
        $this->assertTrue($this->person->setEmail("b42@bloop.edu",$this->em));
        $this->assertTrue($this->person->setEmail("b42@bloop.com",$this->em));

        // should return false (it cannot be null)
        $this->assertFalse($this->person->setEmail("",$this->em));

        // should return false (invalid email)
        $this->assertFalse($this->person->setEmail(9464,$this->em));
        $this->assertFalse($this->person->setEmail("dbie",$this->em));
        $this->assertFalse($this->person->setEmail("beog.com",$this->em));
        $this->assertFalse($this->person->setEmail("pizza@yummy",$this->em));
        $this->assertFalse($this->person->setEmail("pizza@.net",$this->em));
        $this->assertFalse($this->person->setEmail("wrong",$this->em));
    }

    // Test 3
    public function testValPNumber(){
        // should return true
        $this->assertTrue($this->person->setPNumber("1919-919-9199"));
        $this->assertTrue($this->person->setPNumber("919.919.9919"));
        $this->assertTrue($this->person->setPNumber("9199199919"));
        $this->assertTrue($this->person->setPNumber("(919)9199919"));
        $this->assertTrue($this->person->setPNumber(9199199919));
        $this->assertTrue($this->person->setPNumber(919.9199919));

        // should return false (it cannot be null)
        $this->assertFalse($this->person->setPNumber(""));

        // should return false (invalid pNumber)
        $this->assertFalse($this->person->setPNumber("919-919-999199"));
        $this->assertFalse($this->person->setPNumber("919"));
        $this->assertFalse($this->person->setPNumber("919909909a"));
    }


} 