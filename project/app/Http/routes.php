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

//EventController Stuff
Route::get('events/eventdetail/{event_id}', 'EventsController@GetOneEvent');
Route::get('events/eventform/get', 'EventsController@ShowCreateForm');
Route::post('events/eventform/post', 'EventsController@CreateEvent');
Route::post('events/deleteevent/post', 'EventsController@DeleteEvent');
Route::post('events/{sailing}', 'EventsController@GetAllEvents');
//End of Event Controller Stuff

Route::get('/sailings', 'SailingsController@GetAllSailings');
Route::get('/sailings/sailingform/get', 'SailingsController@ShowCreateForm');
Route::post('/sailings/sailingform/post', 'SailingsController@CreateSailing');
Route::get('/sailings/delete/{id}', 'SailingsController@DeleteSailing');
Route::get('/sailings/{id}', 'SailingsController@GetSailing');

// just to see the
Route::get('/testsailing/{user_id}/{sailing_id}', function($user_id, $sailing_id) {
    return view('sailingtest', compact('user_id', 'sailing_id'));
});

Route::get('/joinsailing/{user_id}/{sailing_id}', 'UserSailingsController@JoinSailing');

Route::get('/leavesailing/{user_id}/{sailing_id}', 'UserSailingsController@LeaveSailing');

Route::get('/allsailingusers/{user_id}', 'UserSailingsController@GetAllUsers');

Route::get('/allusersailings/{user_id}', 'UserSailingsController@GetAllSailings');
