<?php
/**
 * Created by PhpStorm.
 * User: Cheng
 * Date: 2016-04-20
 * Time: 10:47 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    protected function GetUser()
    {
        return view('users');
    }

    protected function CreateUser()
    {

    }

    protected function UpdateUser()
    {

    }

    protected function DeleteUser()
    {

    }
}

