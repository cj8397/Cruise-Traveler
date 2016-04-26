<?php

namespace App\Http\Controllers;
use App\Event;
use App\Http\Requests;
use App\UserEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserEventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // create entry in bridge table
    public function JoinEvent($event_id)
    {
        $user_id = Auth::User()->id;
        // role = member// need to check both columns....
        $userevent = UserEvent::firstOrNew([
            'user_id' => $user_id,
            'event_id' => $event_id,
        ]);
        $event = Event::where('id', $event_id)->first();

        if (!$userevent->exists) { // doesnt exist
            // need to assign properties
            $userevent->user_id = $user_id;
            $userevent->event_id = $event_id;
            $userevent->role = 'participant';
            $userevent->save();
            $success = "Joined the event.";
            return view('events.eventdetail', compact( 'event', 'success'));
        } else {
            $failure = "Already joined the event.";
            return view('events.eventdetail', compact( 'event', 'failure'));
        }
    }

    // remove entry from bridge table
    public function LeaveEvent($event_id)
    { $user_id = Auth::User()->id;
        $conditions = compact('user_id', 'event_id');
        $event = Event::where('id', $event_id)->first();
        if (UserEvent::where($conditions)->exists()) {
            UserEvent::where($conditions)->delete();
            $success = "Left the event.";
            return view('events.eventdetail', compact( 'event', 'success'));
        } else {
            $failure = "Not Participating In Event";
            return view('events.eventdetail', compact( 'event', 'failure'));
        }
        }

    // getAllUsers going to event
    // getAllUsers in a event
    public function GetAllUsers($event_id)
    {
        $users = UserEvent::where(['event_id' => $event_id])->get();
        if ($users != null) {
            return $users;
        } else {
            return 'no users';
        }
    }

    // get all events for a user
    /* public function GetAllEvents()
     {
         $user_id = Auth::User()->id;
         $events = UserEvent::where(['user_id' => $user_id])->get();
         if ($events != null) {
             return [$events];
         } else {
             return 'no events';
         }
     }*/
}
