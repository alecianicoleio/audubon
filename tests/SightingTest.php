<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/25/14
 * Time: 3:34 PM
 */

namespace Audubon;

class SightingTest {
    protected $sighting;

    protected function setUp(){
        $this->sighting = new Sighting();
    }

    // Test 1
    public function testValLocation(){
        // should return true
        $this->assertTrue($this->sighting->setLocation("yard"));
        $this->assertTrue($this->sighting->setLocation("999"));
        $this->assertTrue($this->sighting->setLocation(999));
        $this->assertTrue($this->sighting->setLocation("basement"));

        // should return false (it cannot be null)
        $this->assertFalse($this->sighting->setLocation(""));
    }

    // Test 2
    public function testValCity(){
        // should return true
        $this->assertTrue($this->sighting->setCity("Greenville"));
        $this->assertTrue($this->sighting->setCity("Spring lake9"));
        $this->assertTrue($this->sighting->setLocation("Detroit"));
        $this->assertTrue($this->sighting->setLocation(999));

        // should return false (it cannot be null)
        $this->assertFalse($this->sighting->setLocation(""));
    }

    // Test 3
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
        $this->assertEquals($date,$this->sighting->setDateTime("2010","4","20","5","10"));
        $this->assertEquals($date,$this->sighting->setDateTime(2010,4,20,5,10));
        $this->assertEquals($date,$this->sighting->setDateTime("2010",4,20,5,10));
        $this->assertEquals($date,$this->sighting->setDateTime(2010,"4",20,"5",10));
        // Leap year
        $date = new \DateTime("2000-2-29");
        $date->setTime(10,5,0);
        $this->assertEquals($date,$this->sighting->setDateTime(2000,1,29,5,10));

        // should return false (it cannot be null)
        $this->assertFalse($this->sighting->setDateTime("","","","",""));

        // should return false (invalid date)
        $this->assertFalse($this->sighting->setDateTime("a","b","a","c","d"));
        $this->assertFalse($this->sighting->setDateTime(2010,"b",5,"a","f"));
        // Date can't be greater than current date
        $this->assertFalse($this->sighting->setDateTime(2015,4,20,5,10));
        $this->assertFalse($this->sighting->setDateTime(2013,1,29,5,10));
    }

    // Test 4
    public function testValState(){
        // should return true
        $this->assertTrue($this->sighting->setState("MI"));
        $this->assertTrue($this->sighting->setState("WI"));
        $this->assertTrue($this->sighting->setState("MN"));
        $this->assertTrue($this->sighting->setState("OH"));

        // should return false (it cannot be null)
        $this->assertFalse($this->sighting->setState(""));

        // should return false (invalid state)
        $this->assertFalse($this->sighting->setState("pete"));
        $this->assertFalse($this->sighting->setState("M"));
        $this->assertFalse($this->sighting->setState("China"));
        $this->assertFalse($this->sighting->setState("cake"));
        $this->assertFalse($this->sighting->setState("GI"));
    }
} 