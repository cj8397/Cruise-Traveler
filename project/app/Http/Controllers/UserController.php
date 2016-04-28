<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetails;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserDetailsRequest;

class UserController extends Controller
{
    use EventTraits;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEvents()
    {
        $sailingEvents = [];
        $sailingDetails = [];
        //return User::all();
        //$userEvents = $this->GetAllEvents(Auth::User()->id);
        $userSailings = $this->GetAllSailings(Auth::User()->id);
//        return $userSailings;
        if (count($userSailings) >= 1) {
            foreach ($userSailings as $sailing) {
                $sailingDetails = array_add($sailingDetails, $sailing->sailing_id, $this->GetSailingDetail($sailing->sailing_id));
                $sailingEvents = array_add($sailingEvents, $sailing->sailing_id, $this->GetSailingEvents($sailing->sailing_id));
            }

            //return $sailingEvents[10];
            return view('users.userprofile')->with(['sailingevents' => $sailingEvents, 'usersailings' => $userSailings, 'sailingdetails' => $sailingDetails]);
        } else {
            return view('users.userprofile');
        }
    }
    protected function getDetails(){
      if($user_id = Auth::User()->id)
      {
        if($userDetail = UserDetails::where('user_id', $user_id)->first())
        {
          return view('users.detail', compact('userDetail'));
        }else{
          return redirect('users/create');
        }
      }else{
        return redirect::back();
      }
    }
    protected function showCreateForm(){
        return view('users.createdetail');
    }
    protected function createUserDetails(UserDetailsRequest $request){
      $userDetails = UserDetails::create([
          'user_id' => Auth::user()->id,
          'first' => $request->first,
          'last' => $request->last,
          'dob' => $request->dob,
          'sex' => $request->sex,
          'lang' => $request->lang,
          'country' => $request->country,
          'ethnicity' => $request->ethnicity,
          'hobby' => $request->hobby,
          'family' => $request->family,
          'co_travellers' => $request->co_travellers,
          'region' => $request->region,
          'city' => $request->city,
          'address' => $request->address
      ]);
      return redirect('users/detail');
    }

}
