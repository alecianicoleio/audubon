<?php
/**
 * Created: 11/12/2014
 * By Lawrence@40visuals.com
 *
 * Order handles data about the total order, and computes the total cost.
 */
namespace Audubon;

class Person {
    private $id;
    private $name;
    private $email;
    private $pNumber;
    private $validate;
    // if there is an error, we will not submit any data to the database
    private $hasErrors = false;
    // check if object should be submitted to the database (don't submit on duplicate)
    private $checkSubmit = true;
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

        $this->hasErrors=true;
        return false;
    }

    public function setEmail($email,$em) {
        if($this->validate->valEmail($email)){
            // if email exists, then this person already exists in the database, thus don't add a duplicate
            if($em->getRepository('Audubon\Person')->emailExists($email)){
                $this->checkSubmit=false;
                return false;
            }

            $this->email = $email;
            return true;
        }

        $this->hasErrors=true;
        return false;
    }

    public function setPNumber($pNumber) {
        if($this->validate->valPNumber($pNumber)){
            $this->pNumber = $pNumber;
            return true;
        }

        $this->hasErrors=true;
        return false;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPNumber() {
        return $this->pNumber;
    }

    public function getHasErrors(){
        return $this->hasErrors;
    }

    public function getCheckSubmit(){
        return $this->checkSubmit;
    }
}
?>
