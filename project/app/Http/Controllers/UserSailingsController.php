<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserSailing;

class UserSailingsController extends Controller
{
    // create entry in bridge table
    public function JoinSailing($user_id, $sailing_id) {
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
            $success = "sucessfully added to user_sailigns";
            return view('sailingtest', compact('user_id', 'sailing_id', 'success'));
        } else {
            $failure= "Already joined the sailing";
            return view('sailingtest', compact('user_id', 'sailing_id', 'failure'));
        }
    }

    // remove entry from bridge table
    public function LeaveSailing($user_id, $sailing_id) {
        // creates key value pair based on variable names
        $conditions = compact('user_id', 'sailing_id');
        if( UserSailing::where($conditions)->exists()) {
            UserSailing::where($conditions)->delete();
            $success = "sucessfully deleted from user_sailigns";
            return view('sailingtest', compact('user_id', 'sailing_id', 'success'));
        }
    }

    // getAllUsers in a sailing
    public function GetAllUsers($sailing_id) {

    }

    // get all sailings for a user
    public function GetAllSailings($user_id) {

    }
}
