<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 10:18 AM
 */

namespace Audubon;


use Doctrine\ORM\EntityRepository;

class BirdRepository extends EntityRepository{

    public function speciesExists($species){
        // Check database for entry for $species and return whether it exists or not
        return $this->findOneBy(array('species' => $species));
    }
} 