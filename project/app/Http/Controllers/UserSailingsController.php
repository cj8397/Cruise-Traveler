<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\UserSailing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class UserSailingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // create entry in bridge table
    public function JoinSailing($sailing_id)
    {

        $user_id = Auth::User()->id;
        // need to check both columns....
        $userSailing = UserSailing::firstOrNew([
            'user_id' => $user_id,
            'sailing_id' => $sailing_id
        ]);

        if(!$userSailing->exists) { // doesnt exist
            // need to assign properties
            $userSailing->user_id = $user_id;
            $userSailing->sailing_id = $sailing_id;
            $userSailing->save();
            $success = "Joined the sailing.";
            return view('sailingtest', compact('user_id', 'sailing_id', 'success'));
        } else {
            $failure= "Already joined the sailing";
            return view('sailingtest', compact('user_id', 'sailing_id', 'failure'));
        }
    }

    // remove entry from bridge table
    public function LeaveSailing($sailing_id)
    {
        $user_id = Auth::User()->id;
        // creates key value pair based on variable names
        $conditions = compact('user_id', 'sailing_id');
        if( UserSailing::where($conditions)->exists()) {
            UserSailing::where($conditions)->delete();
            $success = "Left the sailing";
            return view('sailingtest', compact('user_id', 'sailing_id', 'success'));
        } else {
            $failure = "Already left the sailing";
            return view('sailingtest', compact('user_id', 'sailing_id', 'failure'));
        }
    }

    // getAllUsers in a sailing
    public function GetAllUsers($sailing_id) {
        $users = UserSailing::where(['sailing_id' => $sailing_id])->get();
        if ($users != null) {
            return $users;
        } else {
            return 'no users';
        }
    }

    // get all sailings for a user
    public function GetAllSailings()
    {
        $user_id = Auth::User()->id;
        $sailings = UserSailing::where(['user_id' => $user_id])->get();
        if ($sailings != null) {
            return $sailings;
        } else {
            return 'no sailings';
        }
    }
}
