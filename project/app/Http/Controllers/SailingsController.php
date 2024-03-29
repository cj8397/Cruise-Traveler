<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserSailingsController;
use App\Sailing;
use App\Event;
use App\Stats;
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SailingRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Response;
use Cmgmyr\Messenger\Models\Thread;

class SailingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['GetAllSailings', 'GetSailing']]);
        $this->middleware('admin', ['except' => ['GetAllSailings', 'GetSailing']]);
    }
    //
    protected function GetAllSailings(SearchRequest $request)
    {
        $destinations = Sailing::select('destination')->groupBy('destination')->get();
        $ports= Sailing::select('port_org')->groupBy('port_org')->get();
        if ($sailings = Sailing::search($request)) {
            $statsController = new UserSailingsController();
            foreach($sailings as $sailing) {
                $sailing['stats'] = $statsController->GetTop3Summary($sailing->id);
            }
            return view('sailings.list', compact('sailings', 'destinations', 'ports', 'request'));
        } else {
             return redirect::back();
        }
    }

    protected function GetSailing( $id)
    {
            if ($sailing = Sailing::find($id)) {
                $statsController = new UserSailingsController();
                $stats = $statsController->GetStatsSummary($id); // should add a count in there
                if(Auth::check() && UserSailing::where(['user_id' => Auth::user()->id, 'sailing_id'=> $id])->exists())
                {
                  $currentUser = UserSailing::where(['sailing_id' => $id, 'user_id'=> Auth::user()->id])->first();
                    $thread = Thread::where(['event_id' => null, 'sailing_id' => $id])->first();
                    $thread->messages = $thread->messages->sortByDesc('created_at');
                    return view('sailings.detail', compact('sailing', 'stats', 'thread','currentUser'));
                }else{
                    return view('sailings.detail', compact('sailing', 'stats','currentUser'));
                }
            } else {
                $statsController = new UserSailingsController();
                $stats = $statsController->GetStatsSummary($id); // should add a count in there
                return view('sailings.detail', compact('sailing', 'stats'));
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
        Thread::where(['event_id' => null, 'sailing_id' => $id])->delete();
        $sailing->delete();
    }
}
