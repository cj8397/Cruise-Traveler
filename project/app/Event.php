<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = [
        'sailing_id','title','start_date','end_date','desc','location'
    ];
    public $timestamps = false;

    public function users(){
       return $this->belongsToMany(User::class, 'event_users');
    }
}
