<?php
	
namespace Audubon\Service;
use Audubon\Entities\Sighting;
use Respect\Validation\Validator as RespectValidator;

class SightingValidator extends AudubonValidator {

	private $birdValidator;
	private $personValidator;

	public function __construct(RespectValidator $respectValidator, BirdValidator $birdValidator, PersonValidator $personValidator){
		
		parent::__construct($respectValidator);
		$this->birdValidator = $birdValidator;
		$this->personValidator = $personValidator;
	}

	public function validateSighting(Sighting $sighting){

		if(!empty($sighting->getPerson()) && !$this->personValidator->validatePerson($sighting->getPerson())){
			return false;
		}
		if(!$this->birdValidator->validateBird($sighting->getBird())){
			return false;
		}

		// Validate all the other sighting stuff (date, time, location)
		if(!$sighting->getDate() instanceof \DateTime){
			return false;
		}
		if($this->isEmpty($sighting->getLocation())){
			return false;
		}

		return true;
	}
		

}

