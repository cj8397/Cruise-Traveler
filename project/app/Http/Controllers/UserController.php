<?php

namespace App\Http\Controllers;

use App\User;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use EventTraits;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEvents()
    {
        //return User::all();
        $userEvents = $this->GetAllEvents(Auth::User()->id);
        $userSailings = $this->GetAllSailings(Auth::User()->id);
//        return $userSailings;
        if (count($userSailings) >= 1) {
            foreach ($userSailings as $sailing) {
                //var_dump($sailing->sailing_id);
                $sailingEvents = $this->GetSailingEvents($sailing->sailing_id);
                $sailingDetails = $this->GetSailingDetail($sailing->sailing_id);
            }
            //return $sailingEvents;

            //return view('users.userprofile')->with(['userevents'=>$userEvents, 'usersailings'=>$userSailings]);
            return view('users.userprofile')->with(['sailingevents' => $sailingEvents, 'usersailings' => $userSailings, 'sailingdetails' => $sailingDetails]);
        } else {
            return view('users.userprofile');
        }
    }

}
