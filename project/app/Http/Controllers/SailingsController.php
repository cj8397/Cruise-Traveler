<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sailing;

class SailingsController extends Controller
{
    //
    protected function GetAllSailings(){
        if($sailings = Sailing::all()){
            return view('sailings.list')->with('sailings', $sailings);
        };
    }
}
