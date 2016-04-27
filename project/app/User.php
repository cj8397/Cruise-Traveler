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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userevent()
    {
        return $this->hasMany('App\UserEvent');
    }
    public function isAdmin()
    {
      if ($admin = Admin::where('username', $this->attributes['email'])->first())
      {
        if($admin->username == $this->attributes['email'] && $admin->password == $this->attributes['password'])
          return true;
      }else{
        return false;
    }
  }
}
