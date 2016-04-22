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
            return view('sailings.list', compact('sailings'));
        }else{
          return redirect::back();
        }
    }
    protected function GetSailing($id){
      if($sailing = Sailing::find($id)){
        return view('sailings.detail', compact('sailing'));
      }else{
        return redirect('/sailings');
      }

    }
    protected function StoreSailing(Request $request, Sailing $sailing){

    }
    protected function DeleteSailing(){

    }
}
