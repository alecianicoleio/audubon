<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Audubon\Entities\HelloWorld;
use LaravelDoctrine\ORM\Facades\EntityManager;

class HelloController extends Controller
{
    public function helloWorld(){
        return view('hello-world', [
            'helloWorlds' => EntityManager::getRepository(HelloWorld::class)->findAll()
        ]);
    }
}
