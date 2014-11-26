<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 11:49 AM
 */

namespace Audubon;

class BirdRepositoryTest extends TestCase{
    protected function setUp(){
        parent::setUp();
        parent::speciesDataSetup();
    }

    // test 1
    public function testSpeciesExist(){
        // speciesDataSetup creates entries with these species, thus this should return true
        $this->assertTrue($this->em->getRepository('Audubon\Bird')->speciesExists("turkey") instanceof Bird);
        $this->assertTrue($this->em->getRepository('Audubon\Bird')->speciesExists("chicken") instanceof Bird);
        $this->assertTrue($this->em->getRepository('Audubon\Bird')->speciesExists("penguin") instanceof Bird);

        // No entry for the below species exist, thus return false
        $this->assertFalse($this->em->getRepository('Audubon\Bird')->speciesExists("lion") instanceof Bird);
        $this->assertFalse($this->em->getRepository('Audubon\Bird')->speciesExists("phoenix") instanceof Bird);
        $this->assertFalse($this->em->getRepository('Audubon\Bird')->speciesExists("chocobo") instanceof Bird);
    }
} 