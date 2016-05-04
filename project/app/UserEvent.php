<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    public $timestamps = false;

    protected $table = 'user_events';
    protected $fillable = [
        'sailing_id', 'user_id', 'event_id', 'role'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userdetails()
    {
        return $this->belongsTo('App\UserDetails', 'user_id', 'user_id');
    }

    public function sailing()
    {
        return $this->belongsTo('App\Sailing');
    }
}
