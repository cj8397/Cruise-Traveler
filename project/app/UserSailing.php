<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class UserSailing extends Model
{

    public $timestamps = false;

    protected $table = 'user_sailings';
    protected $fillable = [
        'user_id', 'sailing_id'
    ];

    public function userevent()
    {
        return $this->hasMany('App\UserEvent');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function userdetails(){
        return $this->belongsTo('App\UserDetails', 'user_id', 'user_id');
    }



}
