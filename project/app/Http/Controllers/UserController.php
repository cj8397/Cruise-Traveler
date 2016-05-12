<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserDetailsRequest;
use App\UserDetails;
use App\UserEvent;
use App\UserSailing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserSailings($user_id)
    {
        $userdetail = UserDetails::where('user_id', $user_id)->first();
        $usersailings = UserSailing::with('sailing')->where('user_id', $user_id)->paginate(6);
        $userevents = UserEvent::with('event')->where('user_id', $user_id)->get();
        $test = UserSailing::with('sailing')->where('user_id', $user_id)->get();

        //return $usersailings;

        return view('users.userprofile')->with(['usersailings' => $usersailings, 'userevents' => $userevents,
            'userdetail' => $userdetail]);
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
    protected function getDetails()
    {
        if ($user_id = Auth::User()->id) {
            if ($userDetail = UserDetails::where('user_id', $user_id)->whereNotNull('dob')->first()) {
                return view('users.detail', compact('userDetail'));
            } else {
                return redirect('users/create');
            }
        } else {
            return redirect::back();
        }
    }

    protected function showCreateForm()
    {
        return view('users.createdetail');
    }

    protected function createUserDetails(UserDetailsRequest $request)
    {
      $user_id = Auth::User()->id;
        $userDetails = UserDetails::where('user_id', $user_id)->first();
            $userDetails->first = $request->first;
            $userDetails->last = $request->last;
            $userDetails->dob = $request->dob;
            $userDetails->sex = $request->sex;
            $userDetails->lang = $request->lang;
            $userDetails->country = $request->country;
            $userDetails->ethinicity = $request->ethnicity;
            $userDetails->hobby = $request->hobby;
            $userDetails->family = $request->family;
            $userDetails->co_travellers = $request->co_travellers;
            $userDetails->region = $request->region;
            $userDetails->city = $request->city;
            $userDetails->address = $request->address;
            $userDetails->two = $request->two;
             $userDetails->five = $request->five;
              $userDetails->twelve = $request->twelve;
               $userDetails->seventeen = $request->seventeen;
                $userDetails->twentyfour = $request->twentyfour;
                 $userDetails->twentynine = $request->twentynine;
                  $userDetails->thirtynine = $request->thirtynine;
            $userDetails->fourtynine = $request->fourtynine;
             $userDetails->fiftynine = $request->fiftynine;
              $userDetails->seventyfour = $request->seventyfour;
               $userDetails->seventyfive = $request->seventyfive;
        $userDetails->save();
        return redirect('users/detail');
    }
}
