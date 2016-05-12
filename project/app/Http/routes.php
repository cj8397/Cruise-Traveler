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
use App\Http\Controllers\UserSailingsController;

Route::get('/', 'HomeController@index');
Route::get('/home', function () {
    return redirect('/');
});

Route::auth();

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/users', 'AdminController@GetAllUsers');
Route::get('/admin/user/{id}', 'AdminController@GetUser');
Route::get('/admin/user/{id}/update', 'AdminController@UpdateUser');
Route::post('/admin/user/{id}/update/save', 'AdminController@SaveUser');

//EventController Stuff
Route::get('events/users', 'EventsController@GetAllUsers');
Route::get('events/detail/{event_id}', 'EventsController@GetOneEvent');
Route::get('events/form/{sailing_id}', 'EventsController@ShowCreateForm');
Route::post('events/form/post', 'EventsController@CreateEvent');
Route::get('events/delete/{event_id}', 'EventsController@DeleteEvent');
Route::get('events/update/{event_id}', 'EventsController@UpdateEvent');
Route::post('events/update/save/{event_id}', 'EventsController@SaveEvent');
Route::get('events/userevents', 'EventsController@getAllUserEvents');
Route::get('events/{sailing}', 'EventsController@GetAllEvents');
//End of Event Controller Stuff

//
Route::get('/sailings/delete/{id}', 'SailingsController@DeleteSailing');
Route::get('/sailings', 'SailingsController@GetAllSailings');
Route::get('/sailings/create', 'SailingsController@ShowCreateForm');
Route::post('/sailings/create/post', 'SailingsController@CreateSailing');
Route::get('sailings/update/{id}', 'SailingsController@UpdateSailing');
Route::post('sailings/update/save/{id}', 'SailingsController@SaveSailing');
Route::get('/sailings/{id}', 'SailingsController@GetSailing');

Route::get('/users/userprofile/{user_id}', 'UserController@getUserSailings');
Route::get('/users/detail', 'UserController@getDetails');
Route::get('/users/create', 'UserController@showCreateForm');
Route::post('/users/create/post', 'UserController@createUserDetails');
//Route::get('/users/{user_id}', 'UserController@getUser');

Route::get('/joinsailing/{user_id}/{sailing_id}', 'UserSailingsController@JoinSailing');

// don't use user_id in the route, can get it in your code using
// also don't think you need to call it aiding id here?
Route::get('/joinsailing/{sailing_id}', 'UserSailingsController@JoinSailing');
Route::get('/leavesailing/{sailing_id}', 'UserSailingsController@LeaveSailing');
Route::get('/sailingusers/{sailing_id}', 'UserSailingsController@GetAllUsers');
Route::get('/usersailings', 'UserSailingsController@GetAllSailings');

Route::get('/sex/{id}', 'UserSailingsController@CalculateSexPercentages');
Route::get('/family/{id}', 'UserSailingsController@CalculateFamilyPercentages');
Route::get('/age/{id}', 'UserSailingsController@CalculateAgePercentages');
Route::get('/lang/{id}', 'UserSailingsController@CalculateLangPercentages');
Route::get('/country/{id}', 'UserSailingsController@CalculateCountryPercentages');
Route::get('/city/{id}', 'UserSailingsController@CalculateCityPercentages');
Route::get('/age/{id}', 'UserSailingsController@CalculateAgePercentages');
Route::get('/summary/{id}', 'UserSailingsController@GetStatsSummary');
Route::get('/top3/{sailing_id}','UserSailingsController@GetTop3Summary');

//
Route::get('/joinevent/{event_id}/{sailing_id}', 'UserEventsController@JoinEvent');
Route::get('/leaveevent/{event_id}', 'UserEventsController@LeaveEvent');
Route::get('/eventusers/{event_id}', 'UserEventsController@GetAllUsers');
Route::get('/userevents', 'UserEventsController@GetAllEvents');

Route::get('/test', function() {
    $string = 'Slot Tournament - Casino Royale,13:00,23:59,,Casino Royale (Deck 6),
Diamond & Gemstone Seminar,13:30,14:00,,Deck 13,
Ice Carving Demonstration,15:00,16:00,,Poolside (Deck 11),
Pathway To Yoga,17:00,18:00,,ShipShape Center (Deck 12),
Big Band Dance Music,17:30,18:30,,Colony Club (Deck 6),
Cigar Aficionados,22:00,23:59,,Sky Bar (Deck 12),
Singles Mix Mingle,20:00,23:00,,Centrum,
PHOTO TIME: ELEGANT,16:00,18:00,"It�۪s not often you dress up in your finest digs. Let us capture the moment - give us your best smile and say ���cheese!�۝",Promenade & Lobby,
KARAOKE AWESOME,21:00,23:59,"Maybe it�۪s a song you choos maybe not. The bottom line is you feel the music and let it take you over.","Alfred�۪s, 4 Mid",
PARTY LIKE IT�۪S 1980,22:00,23:00,"Hop on the flashback train for a good ol�۪ fashioned 80۪s party. Break out those parachute pants big hair and anything else from the 80�۪s and let�۪s rock!","Henri�۪s, 5 Mid",
Sudoku and Brainteasers,8:00,11:00,,"Library, Deck 7 Aft",
Detox for Health and Weight Loss,11:00,13:00,Discover the best way to get rid of vour stubborn belly fat,"Fitness Center, Deck 17 Aft",
Faclal Workshop: Ladies Pamper Party,13:30,15:00,calling all ladies to attend the pampering event of the cruise. Join us for skin specific or luxury skin knowledqe advice tips and free samples,"Lotus Spa, Deck 5 Fwd",
Chocolate Journeys Pastry Demonstration,14:00,15:00,,Deck 7,';

    $data = str_getcsv($string, "\n");
    foreach ($data as $row) {
        $eventInfo = explode(",", $row);
        var_dump($eventInfo[4]);
    }
});
