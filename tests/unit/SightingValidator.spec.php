<?php 

use Audubon\Entities\Bird;
use Audubon\Entities\Person;
use Audubon\Entities\Sighting;
use Audubon\Service\BirdValidator;
use Audubon\Service\PersonValidator;
use Audubon\Service\SightingValidator;
use Respect\Validation\Validator as RespectValidator;

describe ( 'SightingValidator', function(){

	describe ('->validateSighting', function(){
		
		beforeEach(function(){
			$this->assert = new Peridot\Leo\Interfaces\Assert();
			$this->sighting = new Sighting();
			$this->bird = new Bird();
			$this->person = new Person();
			$this->sightingValidator = new SightingValidator(
				new RespectValidator(), 
				new BirdValidator(new RespectValidator()), 
				new PersonValidator(new RespectValidator())
			);
			$this->bird->setSpecies('Owl');
	        $this->bird->setDescription('skhdbfjshbdf');
	        $this->person->setFirst('Alecia');
	        $this->person->setLast('N');
	        $this->person->setPhone('989-222-2222');
	        $this->person->setEmail('sdkjf@gmail.com');
		});

		afterEach(function(){
			$this->sighting->setDate($this->date);
	        $this->sighting->setLocation($this->location);
	        $this->sighting->setBird($this->bird);
	        $this->sighting->setPerson($this->person);
	        $this->assert->strictEqual($this->sightingValidator->validateSighting($this->sighting), $this->expected);
		});

		it('this is a valid sighting', function(){
	  		$this->date = new \DateTime('01-12-2016');
	       	$this->location = 'A location';
	       	$this->expected = true;
	    });

	    it('this is a valid sighting with null person', function(){
	    	$this->person = null;
	  		$this->date = new \DateTime('01-12-2016');
	       	$this->location = 'A location';
	       	$this->expected = true;
	    });

	    it('this is a sighting with invalid person', function(){
	    	$this->person->setFirst('123!!!');
	  		$this->date = new \DateTime('01-12-2016');
	       	$this->location = 'A location';
	       	$this->expected = false;
	    });

	   	it('this is a sighting with invalid datetime', function(){
	    	$this->person = null;
	  		$this->date = 'apples';
	       	$this->location = 'A location';
	       	$this->expected = false;
	    });

	    it('this is a sighting with no datetime', function(){
	    	$this->person = null;
	  		$this->date = '';
	       	$this->location = 'A location';
	       	$this->expected = false;
	    });

	    it('this is a sighting with no location', function(){
	    	$this->person = null;
	  		$this->date = new \DateTime('01-12-2016');
	       	$this->location = '';
	       	$this->expected = false;
	    });

	    it('this is a sighting with all null values', function(){
	    	$this->person = null;
	  		$this->date = null;
	       	$this->location = null;
	       	$this->expected = false;
	    });

	});

});



