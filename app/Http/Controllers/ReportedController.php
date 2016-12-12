<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;

class ReportedController extends Controller
{
    public function reported(){
        return view('reported');
    }
}
