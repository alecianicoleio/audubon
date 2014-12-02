<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/25/14
 * Time: 12:41 PM
 */

namespace Audubon;

class ValidateTest extends TestCase{
    protected $val;
    
    protected function setUp(){
        parent::setUp();
        $this->val=new Validate();
    }

    // Test 1
    public function testValLocation(){
        

        // should return true
        $this->assertTrue($this->val->valLocation("yard"));
        $this->assertTrue($this->val->valLocation("999"));
        $this->assertTrue($this->val->valLocation(999));
        $this->assertTrue($this->val->valLocation("basement"));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valLocation(""));
    }

    // Test 2
    public function testValCity(){
        

        // should return true
        $this->assertTrue($this->val->valCity("Greenville"));
        $this->assertTrue($this->val->valCity("Spring lake9"));
        $this->assertTrue($this->val->valCity("Detroit"));
        $this->assertTrue($this->val->valCity(999));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valCity(""));
    }

    // Test 3
    public function testSpecies(){
        

        // should return true
        $this->assertTrue($this->val->valSpecies("Bird"));
        $this->assertTrue($this->val->valSpecies("Big bird"));
        $this->assertTrue($this->val->valSpecies("Penguin"));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valSpecies(""));

        // should return false (cannot contain a number)
        $this->assertFalse($this->val->valSpecies("9Bird"));
        $this->assertFalse($this->val->valSpecies("Bird9"));
        $this->assertFalse($this->val->valSpecies("B9rd"));
        $this->assertFalse($this->val->valSpecies("B99rd"));
        $this->assertFalse($this->val->valSpecies("9Bird9"));
        $this->assertFalse($this->val->valSpecies(999));
    }

    // Test 4
    public function testValDescription(){
        

        // should return true
        $this->assertTrue($this->val->valDescription("Tasty bird"));
        $this->assertTrue($this->val->valDescription("Yellow bird"));
        $this->assertTrue($this->val->valDescription("Bird owns 45 houses."));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valDescription(""));
    }

    // Test 5
    public function testValName(){
        

        // should return true
        $this->assertTrue($this->val->valName("Pete"));
        $this->assertTrue($this->val->valName("Pete'n'Cool"));
        $this->assertTrue($this->val->valName("topdog52"));
        $this->assertTrue($this->val->valName(""));

        // should return false (can't be greater then 40 chars)
        $this->assertFalse($this->val->valName("klninedkallnknklnlkklajenalknklnlknckldninfailnklnavnelanlnieie904nnknionane4"));
    }

    // Test 6
    public function testValEmail(){
        

        // should return true
        $this->assertTrue($this->val->valEmail("pete@pete.com"));
        $this->assertTrue($this->val->valEmail("b@b.edu"));
        $this->assertTrue($this->val->valEmail("b42@bloop.net"));
        $this->assertTrue($this->val->valEmail("b42@blo42op.net"));
        $this->assertTrue($this->val->valEmail("b42@bloop.edu"));
        $this->assertTrue($this->val->valEmail("b42@bloop.com"));
        $this->assertTrue($this->val->valEmail(""));

        // should return false (invalid email)
        $this->assertFalse($this->val->valEmail(9464));
        $this->assertFalse($this->val->valEmail("dbie"));
        $this->assertFalse($this->val->valEmail("beog.com"));
        $this->assertFalse($this->val->valEmail("pizza@yummy"));
        $this->assertFalse($this->val->valEmail("pizza@.net"));
        $this->assertFalse($this->val->valEmail("wrong"));
    }

    // Test 7
    public function testValPNumber(){
        

        // should return true
        $this->assertTrue($this->val->valPNumber("919-919-9199"));
        $this->assertTrue($this->val->valPNumber("919.919.9919"));
        $this->assertTrue($this->val->valPNumber("9199199919"));
        $this->assertTrue($this->val->valPNumber("(919)9199919"));
        $this->assertTrue($this->val->valPNumber(9199199919));
        $this->assertTrue($this->val->valPNumber(919.9199919));
        $this->assertTrue($this->val->valPNumber(""));

        // should return false (invalid pNumber)
        $this->assertFalse($this->val->valPNumber("919-919-999199"));
        $this->assertFalse($this->val->valPNumber("919"));
        $this->assertFalse($this->val->valPNumber("919909909a"));
    }

    // Test 8
    public function testValDateTime(){
        /*
         * IMPORTANT NOTE!!
         * javascript months are from 0-11, but php is 1-12
         * Because of this, valDateTime increments the month by 1
         */

        // dates should be the same
        // $year, $month, $day, $minute, $hour
        $date = new \DateTime("2010-5-20");
        $date->setTime(10,5,0);
        $this->assertEquals($date,$this->val->valDateTime("2010","4","20","5","10"));
        $this->assertEquals($date,$this->val->valDateTime(2010,4,20,5,10));
        $this->assertEquals($date,$this->val->valDateTime("2010",4,20,5,10));
        $this->assertEquals($date,$this->val->valDateTime(2010,"4",20,"5",10));
        // Leap year
        $date = new \DateTime("2000-2-29");
        $date->setTime(10,5,0);
        $this->assertEquals($date,$this->val->valDateTime(2000,1,29,5,10));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valDateTime("","","","",""));

        // should return false (invalid date)
        $this->assertFalse($this->val->valDateTime("a","b","a","c","d"));
        $this->assertFalse($this->val->valDateTime(2010,"b",5,"a","f"));
        // Date can't be greater than current date
        $this->assertFalse($this->val->valDateTime(2015,4,20,5,10));
        $this->assertFalse($this->val->valDateTime(2013,1,29,5,10));
    }

    // Test 2
    public function testValState(){
        

        // should return true
        $this->assertTrue($this->val->valState("MI"));
        $this->assertTrue($this->val->valState("WI"));
        $this->assertTrue($this->val->valState("MN"));
        $this->assertTrue($this->val->valState("OH"));

        // should return false (it cannot be null)
        $this->assertFalse($this->val->valState(""));

        // should return false (invalid state)
        $this->assertFalse($this->val->valState("pete"));
        $this->assertFalse($this->val->valState("M"));
        $this->assertFalse($this->val->valState("China"));
        $this->assertFalse($this->val->valState("cake"));
        $this->assertFalse($this->val->valState("GI"));
    }
} 