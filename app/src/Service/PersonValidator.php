<?php
	
namespace Audubon\Service;
use Audubon\Entities\Person;

class PersonValidator extends AudubonValidator {

	public function validatePerson(Person $person){


		//var_dump($this->alpha('alphabetical')); // Test alpha
		
		// If the field is not empty and the name contains odd characters

		$names = [$person->getFirst(), $person->getLast()];
		//var_dump($names); 
		foreach($names as $name){
			// var_dump($name); 
			// var_dump($this->hasNumbers($name));
			// var_dump($this->notEmpty($name));
			// var_dump($names); 
			if( $this->notEmpty($name) && $this->hasNumbers($name)){
				return false;
			}
		}

		// Check if this is not empty and is not a valid phone number
		if($this->notEmpty($person->getPhone()) && $this->invalidPhone($person->getPhone())){
			return false;
		}

		// Check if this is not empty and is a valid email
		if($this->notEmpty($person->getEmail()) && $this->invalidEmail($person->getEmail())){
		return false;
		}		

		return true;

	}

}

