<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 11:49 AM
 */

namespace Audubon;

class PersonRepositoryTest extends TestCase {
    protected function setUp(){
        parent::setUp();
        parent::emailDataSetup();
    }

    // test 1
    public function testEmailExists(){
        // emailDataSetup creates entries with these emails, thus this should return true
        $this->assertTrue($this->em->getRepository('Audubon\Person')->emailExists("pete@pete.com") instanceof Person);
        $this->assertTrue($this->em->getRepository('Audubon\Person')->emailExists("definatly@best.com") instanceof Person);
        $this->assertTrue($this->em->getRepository('Audubon\Person')->emailExists("pizza@yummy.edu") instanceof Person);

        // No entry for these emails, thus should return false
        $this->assertFalse($this->em->getRepository('Audubon\Person')->emailExists("frank@frank.com") instanceof Person);
        $this->assertFalse($this->em->getRepository('Audubon\Person')->emailExists("starwars@boring.com") instanceof Person);
        $this->assertFalse($this->em->getRepository('Audubon\Person')->emailExists("lordoftherings@sleep.edu") instanceof Person);
    }
} 