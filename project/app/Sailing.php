<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sailing extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'title', 'cruise_line','start_date','end_date','port_org','port_dest','destination'
    ];
    protected $table = 'sailings';
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

    public function usersailings(){
        return $this->hasMany('App\UserSailing');
    }

    public function userevents(){
        return $this->hasMany('App\UserEvent');
    }
    public function event()
    {
        return $this->hasMany('App\Event');
    }
    public function scopeSearch($query, $search){
        return $query->where('title','LIKE',"%$search->search%")
            ->orWhere('cruise_line','LIKE',"%$search->search%")
            ->orWhere('destination','LIKE',"%$search->search%")
            ->orderBy($search->sort,$search->direction)
            ->paginate(12);
    }

}
