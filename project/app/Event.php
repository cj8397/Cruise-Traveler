<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getEndDateAttribute($value){
        return Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }

    public function setEndDateAttribute($value){
        $this->attributes['end_date']= Carbon::parse($value);
    }

    public function getStartDateAttribute($value){
        return Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }

    public function setStartDateAttribute($value){
        $this->attributes['start_date'] = Carbon::parse($value);
    }
}
