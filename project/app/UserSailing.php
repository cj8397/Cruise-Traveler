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
<<<<<<< HEAD
    public function event(){
        return $this->belongsTo('App\Event');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function sailing(){
=======

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sailing()
    {
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        return $this->belongsTo('App\Sailing');
    }

//    public function event()
//    {
//        return $this->belongsTo('App\Event');
//    }
<<<<<<< HEAD
    public function userdetails(){
=======
    public function userdetails()
    {
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        return $this->belongsTo('App\UserDetails', 'user_id', 'user_id');
    }



}
