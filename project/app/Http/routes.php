<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('events/eventdetail/{event_id}', 'EventsController@GetOneEvent');

Route::get('events/eventform/get', 'EventsController@ShowCreateForm');

Route::post('events/eventform/post', 'EventsController@CreateEvent');

Route::get('/events/{sailing}', 'EventsController@GetAllEvents');

Route::get('/sailings', 'SailingsController@GetAllSailings');

Route::get('/sailings', 'SailingsController@GetAllSailings');

