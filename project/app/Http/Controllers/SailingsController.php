<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sailing;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SailingRequest;
use Illuminate\Support\Facades\Response;

class SailingsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['GetAllSailings', 'GetSailing']]);
      //$this->middleware('auth');
  }
    //
    protected function GetAllSailings(){
        if($sailings = Sailing::all()){
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

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $sailing = Sailing::create([
            'title' => $request->title,
            'cruise_line' => $request->cruise_line,
            'start_date' => $start,
            'end_date' => $end,
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
            $start = Carbon::parse($request->start);
            $end = Carbon::parse($request->end);
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
}
