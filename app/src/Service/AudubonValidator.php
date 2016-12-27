<?php
	
namespace Audubon\Service;
use Respect\Validation\Validator as RespectValidator;

class AudubonValidator {

	protected $validator;
	public function	__construct(RespectValidator $validator){
		$this->validator = $validator;
	}

	protected function getValidator(){
		$this->validator->removeRules();
		return $this->validator;
	}

	public function notEmpty($data){
		return $this->getValidator()->notEmpty()->validate($data);
	}

	public function isEmpty($data){
		return !$this->notEmpty($data); 
	}

	public function alpha($data){
		return $this->getValidator()->alpha()->validate($data);
	}

	public function hasNumbers($data){
		return !$this->alpha($data); 
	}

	public function invalidPhone($data){
		return !$this->getValidator()->phone()->validate($data);
	}

	public function invalidEmail($data){
		return !$this->getValidator()->email()->validate($data);
	}



}

