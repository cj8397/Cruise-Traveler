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

Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/users', 'AdminController@GetAllUsers');
Route::get('/admin/user/{id}', 'AdminController@GetUser');
Route::get('/admin/user/{id}/update', 'AdminController@UpdateUser');
Route::post('/admin/user/{id}/update/save', 'AdminController@SaveUser');

Route::get('/home', 'HomeController@index');

//EventController Stuff
Route::get('events/detail/{event_id}', 'EventsController@GetOneEvent');
Route::get('events/form/{sailing_id}', 'EventsController@ShowCreateForm');
Route::post('events/form/post', 'EventsController@CreateEvent');
Route::get('events/delete/{event_id}', 'EventsController@DeleteEvent');
Route::get('events/update/{event_id}', 'EventsController@UpdateEvent');
Route::post('events/update/save/{event_id}', 'EventsController@SaveEvent');
Route::get('events/users', 'EventsController@GetAllUsers');
Route::get('events/{sailing}', 'EventsController@GetAllEvents');
//End of Event Controller Stuff

Route::get('/sailings', 'SailingsController@GetAllSailings');
Route::get('/sailings/create', 'SailingsController@ShowCreateForm');
Route::post('/sailings/create/post', 'SailingsController@CreateSailing');
Route::get('sailings/update/{id}', 'SailingsController@UpdateSailing');
Route::post('sailings/update/save/{id}', 'SailingsController@SaveSailing');
Route::get('/sailings/delete/{id}', 'SailingsController@DeleteSailing');
Route::get('/sailings/{id}', 'SailingsController@GetSailing');

Route::get('/users/userprofile', 'UserController@getUserSailings');
Route::get('/users/userprofile', 'UserController@getEvents');
Route::get('/users/detail', 'UserController@getDetails');
Route::get('/users/create', 'UserController@showCreateForm');
Route::post('/users/create/post', 'UserController@createUserDetails');

Route::get('/joinsailing/{user_id}/{sailing_id}', 'UserSailingsController@JoinSailing');

// dont use user_id in the route, can get it in your code using
// also dont think you need to call it saiding id here?
Route::get('/joinsailing/{sailing_id}', 'UserSailingsController@JoinSailing');
Route::get('/leavesailing/{sailing_id}', 'UserSailingsController@LeaveSailing');
Route::get('/sailingusers/{sailing_id}', 'UserSailingsController@GetAllUsers');
Route::get('/usersailings', 'UserSailingsController@GetAllSailings');
Route::get('/sex/{id}', 'UserSailingsController@CalculateSexPercentages');
Route::get('/age/{id}', 'UserSailingsController@CalculateAgePercentages');
Route::get('/lang/{id}', 'UserSailingsController@CalculateLangPercentages');
//
Route::get('/joinevent/{event_id}', 'UserEventsController@JoinEvent');
Route::get('/leaveevent/{event_id}', 'UserEventsController@LeaveEvent');
Route::get('/eventusers/{event_id}', 'UserEventsController@GetAllUsers');
Route::get('/userevents', 'UserEventsController@GetAllEvents');
