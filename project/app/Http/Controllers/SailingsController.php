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
use App\UserSailing;
use App\UserEvent;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SailingRequest;
use Illuminate\Support\Facades\Response;

class SailingsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['GetAllSailings', 'GetSailing']]);
      $this->middleware('admin', ['except' => ['GetAllSailings', 'GetSailing']]);
  }
    //
    protected function GetAllSailings(){
        if($sailings = Sailing::all()){
            $controller = new UserSailingsController();
            $percentages = array();
            foreach($sailings as $sailing) {
                $controller->CalculateSexPercentages($sailing->id);
                $percentages[$sailing->id] = $controller->CalculateSexPercentages($sailing->id);
            }
            return view('sailings.list', compact('sailings'));
        } else {
            return redirect::back();
        }
    }

    protected function GetSailing($id)
    {
        if ($sailing = Sailing::find($id)) {
            return view('sailings.detail', compact('sailing'));
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
        return redirect('sailings');
    }
    protected function UpdateSailing($id){
      if ($sailing = Sailing::find($id)) {
          return view('sailings.update', compact('sailing'));
      } else {
          return redirect('sailings');
      }
    }

    protected function SaveSailing($id, SailingRequest $request){
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
        }else{
            return redirect('sailings');
        }
      }

        protected function DeleteSailing($id){
            if ($sailing = Sailing::find($id)) {

              $events = Event::where('sailing_id', $id)->get();

              foreach($events as $event){
                UserEvent::where('event_id', $event->id)->delete();
                $event->delete();
              }

              $userSailings = UserSailing::where('sailing_id', $id)->get();

              foreach($userSailings as $userSailing){
                $userSailing->delete();
              }

              $sailing->delete();

              return redirect('sailings');

            } else {
              return redirect::back();
            }

          }
        }
