<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@helloWorld');

Route::get('sighting', [ 
	'as' => 'sighting.create.route',
	'uses' => 'SightingController@sighting'
]);

Route::get('reported', [
	'as' => 'sighting.report.route',
	'uses' =>'SightingController@reported'
]);

Route::get('confirmation/{id}', [
	'as' => 'sighting.confirmation.route',
	'uses' =>'SightingController@confirmation'
])->where('id', '[0-9]+');

Route::post('sighting', [ 
	'as' => 'sighting.save.route',
	'uses' => 'SightingController@save'
]);