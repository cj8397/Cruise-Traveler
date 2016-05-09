<?php

namespace App\Http\Controllers;

use App\Sailing;
use App\User;
use App\UserDetails;
use App\UserEvent;
use App\UserSailing;
use Carbon\Carbon;
use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventRequest;
use App\Http\Requests\SearchRequest;
use Cmgmyr\Messenger\Models\Thread;

class EventsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function GetAllParticipantsInEvent($event_id)
    {
        return $usersEvents = UserEvent::all()->where('event_id', $event_id);
    }

    protected function GetAllEvents($sailing, SearchRequest $request)
    {
        //
        if( $events = Event::with('userevent')->where('sailing_id',$sailing)->search($request)){
            return view('events.list')->with(['events' => $events, 'sailing_id' => $sailing]);
        } else {
            return Redirect::back();
        }
    }

    protected function getAllUserEvents(){
        $userEvents = UserSailing::with('event','sailing')->where('user_id',Auth::user()->id)->get();
        return view('events.userList')->with('userSailing',$userEvents);
    }
    protected function GetOneEvent($event_id)
    {
        if ($event = Event::where('id', $event_id)->first()) {
            $members = UserEvent::with('userdetails')->where(['event_id' => $event_id,
                'sailing_id' => $event->sailing_id])->get();
            $host = $members->where('role', 'Host')->first();
            $currentUser = $members->where('user_id', Auth::user()->id)->first();
            if($userEvent = UserEvent::where(['user_id' => Auth::user()->id, 'event_id'=> $event_id])->first())
            {
              $thread = Thread::where(['event_id' => $event_id, 'sailing_id' => $event->sailing_id])->first();

              return view('events.eventdetail')->with([
                  'event' => $event,
                  'members' => $members,
                  'currentUser' => $currentUser,
                  'host' => $host,
                  'thread' => $thread]);
            }else{
            return view('events.eventdetail')->with([
                'event' => $event,
                'members' => $members,
                'currentUser' => $currentUser,
                'host' => $host]);
              }
        } else {
            return Redirect::back();
        }
    }

    protected function ShowCreateForm($sailing_id)
    {
      $user_id = Auth::User()->id;
      if(UserSailing::where(['sailing_id' => $sailing_id, 'user_id' => $user_id])->exists())
      {
        return view('events.createEventForm')->with('sailing_id', $sailing_id);
      }else{
        return redirect()->action('SailingsController@GetSailing',[$sailing_id]);
      }
    }

    protected function GetAllUsers()
    {
        $UserEvent = UserSailing::with('event', 'sailing', 'user')->get()->where('user_id', Auth::user()->id);
        foreach ($UserEvent as $sailing) {
            $eventSailing = $sailing->sailing->with('event')->get();
            foreach ($eventSailing as $ES) {
                var_dump($ES->event);
            }
        }
        // list of users in a sailing
        foreach ($UserEvent as $user) {
            var_dump($user);
            $userdetails = $user->user->with('userdetails')->find([$user->user->id]);
            dd($userdetails);
            // for each user in the sailing, get all their details
            foreach ($userdetails as $userdetail) {
                var_dump($userdetail->userdetails->first()->first);
            }
        }
    }

    protected function CreateEvent(EventRequest $request)
    {
        $event = Event::create([
            'sailing_id' => $request->sailing_id,
            'title' => $request->title,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'desc' => $request->desc,
            'location' => $request->location
        ]);
        Thread::create([
            'event_id' => $event->id,
            'sailing_id' => $event->sailing_id,
            'subject' => $event->title . ' Message Board'
        ]);
        UserEvent::create([
            'sailing_id' => $request->sailing_id,
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'role' => 'Host'
        ]);
        return redirect()->action('EventsController@GetOneEvent', [$event->id]);
    }

    protected function DeleteEvent($event_id)
    {
        if ($uEvent = Event::with('userevent')->where('id', $event_id)->first()) {
           Thread::where(['event_id' => $event_id])->first()->delete();
            foreach($uEvent->userevent->where('event_id',$event_id) as $uE) {

                $uE->delete();
                }
            $uEvent->delete();
            return redirect('/sailings/'.$uEvent->sailing_id);
        } else {
            return false;
        }
    }

    protected function UpdateEvent($event_id)
    {
        if ($event = Event::where('id', $event_id)->first()) {
            return view('events.updateEventForm')->with('event', $event);
        } else {
            return false;
        }
    }

    protected function SaveEvent($event_id, EventRequest $request)
    {
        if ($event = Event::where('id', $event_id)->first()) {
            $event->title = $request->title;
            $event->start_date = $request->start;
            $event->end_date = $request->end;
            $event->desc = $request->desc;
            $event->location = $request->location;
            $event->save();
            return redirect()->action('EventsController@GetOneEvent', [$event_id]);
        } else {
            return false;
        }
    }
}
