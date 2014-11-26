<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 2:56 PM
 */

namespace Audubon;

use Doctrine\ORM\EntityRepository;

class SightingRepository extends EntityRepository{
    public function querySightings(){
        return $this->findAll();
    }
} 