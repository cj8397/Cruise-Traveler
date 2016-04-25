<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $timestamps = false;
    protected $table = 'events';
    protected $fillable = [
        'sailing_id', 'title', 'start_date', 'end_date', 'desc', 'location'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users');
    }
}
