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
Route::get('events/eventform/{sailing_id}', 'EventsController@ShowCreateForm');
Route::post('events/eventform/post', 'EventsController@CreateEvent');
Route::get('events/deleteevent/{event_id}', 'EventsController@DeleteEvent');
Route::get('events/{sailing}', 'EventsController@GetAllEvents');
//End of Event Controller Stuff

Route::get('/events/{sailing}', 'EventsController@GetAllEvents');
Route::get('/eventdetail/{event_id}', 'EventsController@GetOneEvent');

Route::get('/sailings', 'SailingsController@GetAllSailings');
Route::get('/sailings/create', 'SailingsController@ShowCreateForm');
Route::post('/sailings/create/post', 'SailingsController@CreateSailing');
Route::get('/sailings/delete/{id}', 'SailingsController@DeleteSailing');
Route::get('/sailings/{id}', 'SailingsController@GetSailing');

Route::get('/users/userprofile', 'UserController@getUser');

Route::get('/joinsailing/{user_id}/{sailing_id}', 'UserSailingsController@JoinSailing');

// dont use user_id in the route, can get it in your code using
// also dont think you need to call it saiding id here?
Route::get('/joinsailing/{sailing_id}', 'UserSailingsController@JoinSailing');
Route::get('/leavesailing/{sailing_id}', 'UserSailingsController@LeaveSailing');
Route::get('/sailingusers/{sailing_id}', 'UserSailingsController@GetAllUsers');
Route::get('/usersailings', 'UserSailingsController@GetAllSailings');

//
Route::get('/joinevent/{event_id}', 'UserEventsController@JoinEvent');
Route::get('/leaveevent/{event_id}', 'UserEventsController@LeaveEvent');
Route::get('/eventusers/{event_id}', 'UserEventsController@GetAllUsers');
Route::get('/userevents', 'UserEventsController@GetAllEvents');

Route::get('/users/userevents', 'UserController@getUserEvents');
