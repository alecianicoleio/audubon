<?php
	
namespace Audubon\Service;
use Audubon\Entities\Bird;

class BirdValidator extends AudubonValidator {
	public function validateBird(Bird $bird){


		
		//Check if species and description are not empty 
		if( $this->isEmpty($bird->getSpecies()) || $this->hasNumbers($bird->getSpecies()) ){
			return false;
		}

		if( $this->isEmpty($bird->getDescription() ) ){
			return false;
		}

		return true;

	}
}

