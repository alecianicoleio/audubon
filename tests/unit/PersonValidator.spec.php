<?php 

use Audubon\Entities\Person;
use Audubon\Service\PersonValidator;
use Respect\Validation\Validator as RespectValidator;


describe ( 'PersonValidator', function(){

	describe ('->validatePerson()', function(){

		beforeEach(function(){
			$this->assert = new Peridot\Leo\Interfaces\Assert();
			$this->person = new Person();
			$this->personValidator = new PersonValidator(new RespectValidator());
		});

		afterEach(function(){
			$this->person->setFirst($this->first);
	        $this->person->setLast($this->last);
	        $this->person->setPhone($this->phone);
	        $this->person->setEmail($this->email);
	        $this->assert->strictEqual($this->personValidator->validatePerson($this->person), $this->expected);
		});

		it('it is a valid person', function(){
	        $this->first = 'Alecia';
	        $this->last = 'Nicole';
	        $this->phone = '989-233-2333';
	        $this->email = 'emailaddress@email.com';
	        $this->expected = true;
	    });

		it('it is an invalid firstname', function(){
	        $this->first = '12345!';
	        $this->last = 'Nicole';
	        $this->phone = '989-233-2333';
	        $this->email = 'emailaddress@email.com';
	        $this->expected = false;
	    });

	    it('it is an invalid lastname', function(){
	        $this->first = 'Alecia';
	        $this->last = '123hkjhb45!';
	        $this->phone = '989-233-2333';
	        $this->email = 'emailaddress@email.com';
	        $this->expected = false;
	    });

	    it('it is a person with no name', function(){
	        $this->first = '';
	        $this->last = '';
	        $this->phone = '989-233-2333';
	        $this->email = 'emailaddress@email.com';
	        $this->expected = true;
	    });

	    it('it is an invalid phone number', function(){
	        $this->first = 'Alecia';
	        $this->last = 'Nicole!';
	        $this->phone = 'Math!';
	        $this->email = 'emailaddress@email.com';
	        $this->expected = false;
	    });

	    it('it is an invalid email', function(){
	        $this->first = 'Alecia';
	        $this->last = 'Nicole!';
	        $this->phone = '989-233-2333';
	        $this->email = 'Math!';
	        $this->expected = false;
	    });

	    it('it is a person with no data', function(){
	        $this->first = '';
	        $this->last = '';
	        $this->phone = '';
	        $this->email = '';
	        $this->expected = true;
	    });

	    

	    
	});

});
