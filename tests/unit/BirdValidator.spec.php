<?php 

use Audubon\Entities\Bird;
use Audubon\Service\BirdValidator;
use Respect\Validation\Validator as RespectValidator;

describe ( 'BirdValidator', function(){

	describe ('->validateBird()', function(){

		beforeEach(function(){
			$this->assert = new Peridot\Leo\Interfaces\Assert();
			$this->bird = new Bird();
			$this->birdValidator = new BirdValidator(new RespectValidator());
		});

		afterEach(function(){
			$this->bird->setSpecies($this->species);
	        $this->bird->setDescription($this->description);
	        $this->assert->strictEqual($this->birdValidator->validateBird($this->bird), $this->expected);
		});

		it('it is a valid bird', function(){
	        $this->species = 'Owl';
	        $this->description = 'skhdbfjshbdf';
	        $this->expected = true;
	    });

	    it('it is a bird with an invalid species', function(){
	        $this->species = '666';
	        $this->description = 'skhdbfjshbdf';
	       	$this->expected = false;
	    });

	    it('it is a bird with no description', function(){
	        $this->species = 'Owl';
	        $this->description = '';
	        $this->expected = false;
	    });

	    it('it is a bird with invalid species and no description', function(){
	        $this->species = '666';
	        $this->description = '';
	        $this->expected = false;
	    });

	    it('it is a bird with no species or description', function(){
	        $this->species = '';
	        $this->description = '';
	  		$this->expected = false;
	    });
	    
	});

});
