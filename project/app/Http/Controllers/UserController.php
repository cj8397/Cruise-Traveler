<?php

namespace App\Http\Controllers;

use App\User;
use App\UserSailing;
use App\UserEvent;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserSailings()
    {
        $usersailings = UserSailing::with('sailing')->get()->where('user_id', Auth::user()->id);
        $userevents = UserEvent::with('event')->get()->where('user_id', Auth::user()->id);

        //dd($usersailings->sailing->sailing_id);
        //dd($usersailings->first()->sailing->title);

        return view('users.userprofile')->with(['usersailings' => $usersailings, 'userevents' => $userevents]);
    }

    /*public function getEvents()
    {
        $userEvents = [];
        $sailingDetails = [];
        $eventDetails = [];
        //return User::all();
        $userSailings = $this->GetAllSailings(Auth::User()->id);
        //$userEvents = $this->GetAllEvents(Auth::User()->id);
        //return $userSailings;
        if (count($userSailings) >= 1) {
            foreach ($userSailings as $sailing) {
                $sailingDetails = array_add($sailingDetails, $sailing->sailing_id, $this->GetSailingDetail($sailing->sailing_id));
                //$sailingEvents = array_add($sailingEvents, $sailing->sailing_id, $this->GetSailingEvents($sailing->sailing_id));
                $userEvents = array_add($userEvents, $sailing->sailing_id, $this->GetAllEvents($sailing->sailing_id, $sailing->user_id));
                foreach ($userEvents[$sailing->sailing_id] as $event)
                {
                    $eventDetails = array_add($eventDetails, $event->event_id, $this->GetEventDetails($event->event_id));
                }

            }
            //return $userSailings;

            return view('users.userprofile')->with(['usersailings' => $userSailings, 'sailingdetails' => $sailingDetails,
                'userevents' => $userEvents, 'eventdetails' => $eventDetails
            ]);
        } else {
            return view('users.userprofile');
        }
    }*/
}
