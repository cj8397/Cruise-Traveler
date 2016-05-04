<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Thread;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserSailingsController;
use App\Sailing;
use App\Event;
use App\Stats;
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SailingRequest;
use Illuminate\Support\Facades\Response;

class SailingsController extends Controller
{
<<<<<<< HEAD
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['GetAllSailings', 'GetSailing']]);
      $this->middleware('admin', ['except' => ['GetAllSailings', 'GetSailing']]);
  }
=======
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['GetAllSailings', 'GetSailing']]);
        $this->middleware('admin', ['except' => ['GetAllSailings', 'GetSailing']]);
    }
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
    //
    protected function GetAllSailings()
    {
        if ($sailings = Sailing::all()) {
            return view('sailings.list', compact('sailings'));
        } else {
            return redirect::back();
        }
    }

    protected function GetSailing($id)
    {
        if ($sailing = Sailing::find($id)) {
            $statsController = new UserSailingsController();
            $stats = $statsController->GetStatsSummary($id); // should add a count in there
<<<<<<< HEAD
            if(Auth::check() && $userSailing = UserSailing::where(['user_id' => Auth::user()->id, 'sailing_id'=> $id]))
            {
              $thread = Thread::where(['event_id' => null, 'sailing_id' => $id])->first();
              return view('sailings.detail', compact('sailing', 'stats', 'thread'));
            }else{
              return view('sailings.detail', compact('sailing', 'stats'));
            }
=======
            return view('sailings.detail', compact('sailing', 'stats'));
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        } else {
            return redirect('sailings');
        }

    }

    protected function ShowCreateForm()
    {
        return view('sailings.create');
    }

    protected function CreateSailing(SailingRequest $request)
    {
        $sailing = Sailing::create([
            'title' => $request->title,
            'cruise_line' => $request->cruise_line,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'port_org' => $request->port_org,
            'port_dest' => $request->port_dest,
            'destination' => $request->destination
        ]);
        Thread::create([
            'sailing_id' => $sailing->id,
            'subject' => $sailing->title . ' Message Board'
        ]);
        return redirect('sailings');
    }

    protected function UpdateSailing($id)
    {
        if ($sailing = Sailing::find($id)) {
            return view('sailings.update', compact('sailing'));
        } else {
            return redirect('sailings');
        }
    }

    protected function SaveSailing($id, SailingRequest $request)
    {
        if ($sailing = Sailing::find($id)) {
            $sailing->title = $request->title;
            $sailing->cruise_line = $request->cruise_line;
            $sailing->start_date = $start;
            $sailing->end_date = $end;
            $sailing->port_org = $request->port_org;
            $sailing->port_dest = $request->port_dest;
            $sailing->destination = $request->destination;
            $sailing->save();
            return redirect()->action('SailingsController@GetSailing', [$id]);
        } else {
            return redirect('sailings');
        }
    }

    protected function DeleteSailing($id)
    {
        $sailing = Sailing::with('usersailings', 'userevents')->where('id', $id)->first();
        $events = Event::where('sailing_id', $id);
        $events->delete();
        $sailing->usersailings()->delete();
        $sailing->userevents()->delete();
<<<<<<< HEAD
        Thread::where(['event_id' => null, 'sailing_id' => $id])->delete();
=======
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        $sailing->delete();
    }
}
