<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    public $timestamps = false;

    protected $table = 'user_events';
    protected $fillable = [
<<<<<<< HEAD
       'sailing_id', 'user_id', 'event_id', 'role'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }

    public function user(){
=======
        'sailing_id', 'user_id', 'event_id', 'role'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        return $this->belongsTo('App\User');
    }

    public function userdetails()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\UserDetails','user_id','user_id');
=======
        return $this->belongsTo('App\UserDetails', 'user_id', 'user_id');
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
    }

    public function sailing()
    {
        return $this->belongsTo('App\Sailing');
    }
}
