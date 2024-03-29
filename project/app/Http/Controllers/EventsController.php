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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventRequest;
use App\Http\Requests\SearchRequest;
use Cmgmyr\Messenger\Models\Thread;
use Laracasts\Flash\Flash;

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
        $sail = Sailing::where('id', $sailing)->first();
        if ($request->direction == null) {
            $events = Event::with('userevent')->where('sailing_id', $sailing)->get();
            return view('events.list')->with(['events' => $events, 'sailing' => $sail, 'old' => $request]);
        } else {
            if ($events = Event::with('userevent')->where('sailing_id', $sailing)->search($request)->get()) {
                return view('events.list')->with(['events' => $events, 'sailing' => $sail, 'old' => $request]);
            } else {
                return Redirect::back();
            }
        }
    }

    protected function getAllUserEvents(){
        $userEvents = UserSailing::with('event', 'sailing')->where('user_id', Auth::user()->id)->paginate(1);
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
                $thread->messages = $thread->messages->sortByDesc('created_at');
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
          Flash::success('Enter new event information!');
        return view('events.createEventForm')->with('sailing_id', $sailing_id);
      }else{
          Flash::error('You are not registered in the sailing! sign up to make an event');
        return redirect()->action('SailingsController@GetSailing',[$sailing_id]);
      }
    }

    protected function GetAllUsers()
    {
        // dd(rand(2,9));
        // dd(Sailing::pluck('id')->toArray());
        $userSailings = UserSailing::all();
        dd(Event::all()->where('sailing_id', 2)->pluck('id')->toArray());
        foreach ($userSailings as $userSail) {

            $allEvents = Event::all()->where('sailing_id', $userSail->sailing_id);
            foreach ($allEvents as $event) {
                var_dump($event->title);
            }
        }
        dd(User::pluck('id')->toArray());
        dd(Event::where('sailing_id', Sailing::first()->id + 1)->get());
    }

    protected function CreateEvent(EventRequest $request)
    {
        $event = Event::create([
            'sailing_id' => $request->sailing_id,
            'title' => $request->title,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'desc' => $request->desc,
            'location' => $request->location,
            'max_participants' => $request->max_participants
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
            //Thread::where('event_id', $event_id)->first()->delete();
            foreach($uEvent->userevent as $uE) {
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
