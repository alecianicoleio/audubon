<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Audubon\Entities\HelloWorld;
use LaravelDoctrine\ORM\Facades\EntityManager;

class SightingController extends Controller
{
    public function sighting(){
        return view('sighting');
    }
}
