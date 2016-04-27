<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventsController;
use App\Sailing;
use App\Event;
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SailingRequest;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
  use AuthenticatesAndRegistersUsers;
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }
  protected $redirectTo = '/admin/home';
}
