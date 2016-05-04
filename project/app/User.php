<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent;
<<<<<<< HEAD
use Cmgmyr\Messenger\Traits\Messagable;
=======
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b

class User extends Authenticatable
{

  use Messagable;

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
        if ($admin = Admin::where('username', $this->attributes['email'])->first()) {
            if ($admin->username == $this->attributes['email'] && $admin->password == $this->attributes['password'])
                return true;
        } else {
            return false;
        }
    }
}
