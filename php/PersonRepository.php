<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/26/14
 * Time: 10:39 AM
 */

namespace Audubon;


use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository {

    public function emailExists($email){
        // Check database for entry for $email and return whether it exists or not
        return $this->findOneBy(array('email' => $email));

    }
} 