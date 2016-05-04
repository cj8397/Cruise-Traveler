<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent;

class User extends Authenticatable
{
  //public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userdetails()
    {
        return $this->hasMany('App\UserDetails');
    }

    public function usersailing()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevent()
    {
        return $this->hasMany('App\UserEvent');
    }

    public function isAdmin()
    {
//        if ($admin = Admin::where('user_id', $this->id)->first()) {
//            if ($admin->user_id = $this->id)
//                return true;
//        } else {
//            return false;
//        }
        if ($admin = Admin::where('user_id', $this->attributes['id'])->first()) {
            if ($admin->user_id = $this->attributes['id'])
                return true;
        } else {
            return false;
        }
    }
}
