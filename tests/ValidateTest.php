<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/25/14
 * Time: 12:41 PM
 */

namespace Audubon;

class ValidateTest extends \PHPUnit_Framework_TestCase{

    // Test 1
    public function testValLocation(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valLocation("yard"));
        $this->assertTrue($val->valLocation("999"));
        $this->assertTrue($val->valLocation(999));
        $this->assertTrue($val->valLocation("basement"));

        // should return false (it cannot be null)
        $this->assertFalse($val->valLocation(""));
    }

    // Test 2
    public function testValCity(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valCity("Greenville"));
        $this->assertTrue($val->valCity("Spring lake9"));
        $this->assertTrue($val->valCity("Detroit"));
        $this->assertTrue($val->valCity(999));

        // should return false (it cannot be null)
        $this->assertFalse($val->valCity(""));
    }

    // Test 3
    public function testSpecies(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valSpecies("Bird"));
        $this->assertTrue($val->valSpecies("Big bird"));
        $this->assertTrue($val->valSpecies("Penguin"));

        // should return false (it cannot be null)
        $this->assertFalse($val->valSpecies(""));

        // should return false (cannot contain a number)
        $this->assertFalse($val->valSpecies("9Bird"));
        $this->assertFalse($val->valSpecies("Bird9"));
        $this->assertFalse($val->valSpecies("B9rd"));
        $this->assertFalse($val->valSpecies("B99rd"));
        $this->assertFalse($val->valSpecies("9Bird9"));
        $this->assertFalse($val->valSpecies(999));
    }

    // Test 4
    public function testValDescription(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valDescription("Tasty bird"));
        $this->assertTrue($val->valDescription("Yellow bird"));
        $this->assertTrue($val->valDescription("Bird owns 45 houses."));

        // should return false (it cannot be null)
        $this->assertFalse($val->valDescription(""));
    }

    // Test 5
    public function testValName(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valName("Pete"));
        $this->assertTrue($val->valName("Pete'n'Cool"));
        $this->assertTrue($val->valName("topdog52"));

        // should return false (it cannot be null)
        $this->assertFalse($val->valName(""));

        // should return false (can't be greater then 40 chars)
        $this->assertFalse($val->valName("klninedkallnknklnlkklajenalknklnlknckldninfailnklnavnelanlnieie904nnknionane4"));
    }

    // Test 6
    public function testValEmail(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valEmail("pete@pete.com"));
        $this->assertTrue($val->valEmail("b@b.edu"));
        $this->assertTrue($val->valEmail("b42@bloop.net"));
        $this->assertTrue($val->valEmail("b42@blo42op.net"));
        $this->assertTrue($val->valEmail("b42@bloop.edu"));
        $this->assertTrue($val->valEmail("b42@bloop.com"));

        // should return false (it cannot be null)
        $this->assertFalse($val->valEmail(""));

        // should return false (invalid email)
        $this->assertFalse($val->valEmail(9464));
        $this->assertFalse($val->valEmail("dbie"));
        $this->assertFalse($val->valEmail("beog.com"));
        $this->assertFalse($val->valEmail("pizza@yummy"));
        $this->assertFalse($val->valEmail("pizza@.net"));
        $this->assertFalse($val->valEmail("wrong"));
    }

    // Test 7
    public function testValPNumber(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valPNumber("919-919-9199"));
        $this->assertTrue($val->valPNumber("919.919.9919"));
        $this->assertTrue($val->valPNumber("9199199919"));
        $this->assertTrue($val->valPNumber("(919)9199919"));
        $this->assertTrue($val->valPNumber(9199199919));
        $this->assertTrue($val->valPNumber(919.9199919));

        // should return false (it cannot be null)
        $this->assertFalse($val->valPNumber(""));

        // should return false (invalid pNumber)
        $this->assertFalse($val->valPNumber("919-919-999199"));
        $this->assertFalse($val->valPNumber("919"));
        $this->assertFalse($val->valPNumber("919909909a"));
    }

    // Test 8
    public function testValDateTime(){
        /*
         * IMPORTANT NOTE!!
         * javascript months are from 0-11, but php is 1-12
         * Because of this, valDateTime increments the month by 1
         */

        $val = new Validate();

        // dates should be the same
        // $year, $month, $day, $minute, $hour
        $date = new \DateTime("2010-5-20");
        $date->setTime(10,5,0);
        $this->assertEquals($date,$val->valDateTime("2010","4","20","5","10"));
        $this->assertEquals($date,$val->valDateTime(2010,4,20,5,10));
        $this->assertEquals($date,$val->valDateTime("2010",4,20,5,10));
        $this->assertEquals($date,$val->valDateTime(2010,"4",20,"5",10));
        // Leap year
        $date = new \DateTime("2000-2-29");
        $date->setTime(10,5,0);
        $this->assertEquals($date,$val->valDateTime(2000,1,29,5,10));

        // should return false (it cannot be null)
        $this->assertFalse($val->valDateTime("","","","",""));

        // should return false (invalid date)
        $this->assertFalse($val->valDateTime("a","b","a","c","d"));
        $this->assertFalse($val->valDateTime(2010,"b",5,"a","f"));
        // Date can't be greater than current date
        $this->assertFalse($val->valDateTime(2015,4,20,5,10));
        $this->assertFalse($val->valDateTime(2013,1,29,5,10));
    }

    // Test 2
    public function testValState(){
        $val = new Validate();

        // should return true
        $this->assertTrue($val->valState("MI"));
        $this->assertTrue($val->valState("WI"));
        $this->assertTrue($val->valState("MN"));
        $this->assertTrue($val->valState("OH"));

        // should return false (it cannot be null)
        $this->assertFalse($val->valState(""));

        // should return false (invalid state)
        $this->assertFalse($val->valState("pete"));
        $this->assertFalse($val->valState("M"));
        $this->assertFalse($val->valState("China"));
        $this->assertFalse($val->valState("cake"));
        $this->assertFalse($val->valState("GI"));
    }
} 