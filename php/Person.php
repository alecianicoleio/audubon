<?php
/**
 * Created: 11/12/2014
 * By Lawrence@40visuals.com
 *
 * Order handles data about the total order, and computes the total cost.
 */
class Person{
    private $name;
    private $email;
    private $pNumber;

    public function __construct() {
        $this->name = "";
        $this->email = "";
        $this->pNumber = "";
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPNumber($pNumber) {
        $this->pNumber = $pNumber;
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
