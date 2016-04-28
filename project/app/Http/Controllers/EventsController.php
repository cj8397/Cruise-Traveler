<?php

namespace App\Http\Controllers;

use App\Sailing;
use App\User;
use App\UserEvent;
use App\UserSailing;
use Carbon\Carbon;
use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventRequest;

class EventsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth',['except' => ['GetAllEvents','GetAllUsers']]);
    }

    protected function GetAllParticipantsInEvent($event_id){
        return $usersEvents = UserEvent::all()->where('event_id', $event_id);
    }

    protected function GetAllEvents($sailing){
        if ($events = Event::where('sailing_id', $sailing)->get()) {
            return view('events.list')->with(['events' => $events, 'sailing_id' => $sailing]);
        } else {
            return Redirect::back();
        }
    }

    protected function GetOneEvent($event_id){
        if ($event = Event::where('id', $event_id)->first()) {
            $members = UserEvent::with('event','sailing','user')->get()->where('event_id', $event_id);
            return view('events.eventdetail')->with(['event' => $event,
                'members' => $members]);
        } else {
            return Redirect::back();
        }
    }

    protected function ShowCreateForm($sailing_id){
        return view('events.createEventForm')->with('sailing_id', $sailing_id);
    }

    protected function GetAllUsers(){
        $UserEvent = UserEvent::with('user')->get()->where('event_id', 91);
        // list of users in a sailing
        foreach($UserEvent as $user){
            var_dump($user);
            $userdetails = $user->user->with('userdetails')->find([$user->user->id]);
            var_dump($userdetails);
            // for each user in the sailing, get all their details
            foreach( $userdetails as $userdetail){
                dd($userdetail->userdetails->first()->first);
            }
        }
    }

    protected function CreateEvent(EventRequest $request){
        $event = Event::create([
            'sailing_id' => $request->sailing_id,
            'title' => $request->title,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'desc' => $request->desc,
            'location' => $request->location
        ]);
        UserEvent::create([
            'sailing_id' => $request->sailing_id,
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'role' => 'Host'
        ]);
        return redirect()->action('EventsController@GetOneEvent', [$event->id]);
    }

    protected function DeleteEvent($event_id){
        if ($event = Event::where('id', $event_id)->first()) {
            UserEvent::where('event_id', $event->id)->delete();
            $event->delete();
            return redirect('/sailings');
        } else {
            return false;
        }
    }

    protected function UpdateEvent($event_id){
        if ($event = Event::where('id', $event_id)->first()) {
            return view('events.updateEventForm')->with('event', $event);
        } else {
            return false;
        }
    }

    protected function SaveEvent($event_id, EventRequest $request){
        if ($event = Event::where('id', $event_id)->first()) {
            $event->title = $request->title;
            $event->start_date = $request->start;
            $event->end_date = $request->end;
            $event->desc = $request->desc;
            $event->location = $request->location;
            $event->save();
            return redirect()->action('EventsController@GetOneEvent', [$event_id]);
        }else{
            return false;
        }
    }
}
