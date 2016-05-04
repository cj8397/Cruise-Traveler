<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventsController;
use App\Sailing;
use App\Event;
use App\User;
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Response;


class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }
  protected function index()
  {
      return view('admin.home');
  }
  protected function getAllUsers()
  {
    $users = User::all();
      return view('admin.users', compact('users'));
  }
  protected function getUser($id)
  {
    $user = User::find($id);
      return view('admin.user', compact('user'));
  }
  protected function UpdateUser($id){
    if ($user = User::find($id)) {
        return view('admin.userupdate', compact('user'));
    } else {
        return redirect::back();
    }
  }

  protected function SaveUser($id, UserRequest $request){
      if ($user = User::find($id)) {
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();
          $success = "User updated!";
          return view('admin.user', compact('success', 'user'));
      }else{
        $failure = "User update failed!";
        return view('admin.user', compact('failure', 'user'));
      }
    }
}
