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

// DEMO OF SCROLLING NAV
Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


// DEMO OF THE THUMBNAIL SET UP
Route::get('/events', function() {
    return view('events.list');
});

Route::get('/sailings', function() {
    return view('sailings.list');
});

