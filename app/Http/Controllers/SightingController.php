<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Audubon\Entities\HelloWorld;
use Audubon\Entities\Sighting;
use Audubon\Entities\Person;
use Audubon\Entities\Bird;
use LaravelDoctrine\ORM\Facades\EntityManager;
use DateTime;
use Audubon\Service\BirdValidator;
use Audubon\Service\SightingValidator;
use Audubon\Service\PersonValidator;


class SightingController extends Controller
{
    public function sighting(){
        return view('sighting');
    }

    public function reported(){
    	$sightings = EntityManager::getRepository(Sighting::class)->findAll();
        return view('reported',['sightings'=>$sightings]);
    }

    public function save(Request $request, SightingValidator $sightingValidator){
    
    	$input = $request->input();
    	$person = new Person();
    	$sighting = new Sighting();
    	$bird = new Bird();

    	// If any of the 4 inputs are not empty
    	if ( !empty($input['inputFirst']) || !empty($input['inputLast']) || !empty($input['inputPhone']) || !empty($input['inputEmail']) ){
    		// Then set 
    		$person->setFirst($input['inputFirst']);
	    	$person->setLast($input['inputLast']);
	    	$person->setPhone($input['inputPhone']);
	    	$person->setEmail($input['inputEmail']);
	    	$sighting->setPerson($person);
    	}
    	// Else, without creating person
    	$bird->setSpecies($input['inputSpec']);
    	$bird->setDescription($input['inputDescrip']);
    	$date = new DateTime($input['inputDate'] . ' ' . $input['inputTime']);
    	$sighting->setLocation($input['inputLoc']);
    	$sighting->setDate($date);
    	$sighting->setBird($bird);

        // Validate 
        if (!$sightingValidator->validateSighting($sighting)){
            // if returns false throw exception
            throw new \Exception('Invalid data!!!!');
        }

		EntityManager::persist($sighting);
		EntityManager::flush();
		return redirect(route('sighting.confirmation.route', $sighting->getID()));
    }

    public function confirmation($id){
    	$sighting = EntityManager::getRepository(Sighting::class)->find($id);
    	return view('confirmation',['sighting'=>$sighting]);
    }

}
