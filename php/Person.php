<?php
/**
 * Created: 11/12/2014
 * By Lawrence@40visuals.com
 *
 * Order handles data about the total order, and computes the total cost.
 */
include_once 'Validate.php';

class Person {
    private $id;
    private $name;
    private $email;
    private $pNumber;
    private $validate;
    private $sightings;

    public function __construct() {
        $this->name = "";
        $this->email = "";
        $this->pNumber = "";
        $this->validate = new Validate();
    }

    public function setName($name) {
        if($this->validate->valName($name)){
            $this->name = $name;
            return true;
        }
        return false;
    }

    public function setEmail($email) {
        if($this->validate->valEmail($email)){
            $this->email = $email;
            return true;
        }
        return false;
    }

    public function setPNumber($pNumber) {
        if($this->validate->valPNumber($pNumber)){
            $this->pNumber = $pNumber;
            return true;
        }
        return false;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getpNumber() {
        return $this->pNumber;
    }
}
?>
