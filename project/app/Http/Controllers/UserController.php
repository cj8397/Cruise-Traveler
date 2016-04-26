<?php

namespace App\Http\Controllers;

use App\User;
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

    public function getUser()
    {
        //return User::all();
        $userEvents = $this->GetAllEvents(Auth::User()->id);
        return view('users.userprofile')->with('userevents', $userEvents);

    }
}
