<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 12/2/14
 * Time: 11:37 AM
 */

namespace Audubon;
use Audubon\Configuration\Configuration as Configuration;


class FormHandlerTest extends TestCase{
    protected $formHandler;
    protected $submission;

    protected function setUp(){
        parent::setUp();
        $this->formHandler = new FormHandler();

        // Initially set the submission to be completely valid
        // bird inputs
        $this->submission["species"] = "Flying Monkey";
        $this->submission["desc"] = "Ninja flying monkey";
        // sighting inputs
        $this->submission["year"] = "2012";
        $this->submission["month"] = "11";
        $this->submission["day"] = "25";
        $this->submission["minute"] = "20";
        $this->submission["hour"] = "5";
        $this->submission["location"] = "In the air";
        $this->submission["city"] = "Monkey Paradise";
        $this->submission["states"] = "MI";
        // person inputs
        $this->submission["phone"] = "515-525-4325";
        $this->submission["email"] = "ninja@monkey.com";
        $this->submission["name"] = "Chester";
    }

    // Test 1
    public function testSuccess(){
        $this->assertEquals("Submission Successful", $this->formHandler->processForm($this->submission));

        $this->submission["phone"] = "";
        $this->submission["email"] = "";
        $this->submission["name"] = "";
        $this->assertEquals("Submission Successful", $this->formHandler->processForm($this->submission));

        $this->submission["phone"] = "515-525-4325";
        $this->submission["email"] = "pete@pete.com";
        $this->submission["name"] = "Chester";
        $this->assertEquals("Submission Successful", $this->formHandler->processForm($this->submission));
    }

    // Test 2
    public function testInvalidPerson(){
        $this->submission["phone"] = "919-919-999199";
        $this->assertEquals("Person inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["phone"] = "515-525-4325";
        $this->submission["email"] = "ninja@monkey";
        $this->assertEquals("Person inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["email"] = "ninja@monkey.com";
        $this->submission["name"] = "ljkjlkjlklklkjaneionlanvlkanlkeaoihvlaknoiheiofhnakln";
        $this->assertEquals("Person inputs contain an error", $this->formHandler->processForm($this->submission));

    }

    // Test 3
    public function testInvalidBird(){
        $this->submission["species"] = "";
        $this->assertEquals("Bird inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["species"] = "Penguin";
        $this->submission["desc"] = "";
        $this->assertEquals("Bird inputs contain an error", $this->formHandler->processForm($this->submission));
    }

    // Test 4
    public function testSuccessSighting(){
        $this->submission["year"] = "2020";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["year"] = "2010";
        $this->submission["month"] = "13";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["day"] = "51";
        $this->submission["month"] = "10";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["day"] = "20";
        $this->submission["minute"] = "105";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["minute"] = "52";
        $this->submission["hour"] = "51";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["hour"] = "5";
        $this->submission["location"] = "";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["location"] = "anywhere";
        $this->submission["city"] = "";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

        $this->submission["city"] = "Monkey Paradise";
        $this->submission["states"] = "PL";
        $this->assertEquals("Sighting inputs contain an error", $this->formHandler->processForm($this->submission));

    }
} 