<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sailing extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'title', 'cruise_line', 'start_date', 'end_date', 'port_org', 'port_dest', 'destination'
    ];
    protected $table = 'sailings';

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value);
    }

    public function usersailings()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevents()
    {
        return $this->hasMany('App\UserEvent');
    }

    public function event()
    {
        return $this->hasMany('App\Event');
    }
    public function scopeSearch($query, $search){
        // all empty return everything
        if($search->search == "" && $search->destination == "" && $search->origin == "" && $search->sort == "" ){
            return $query->paginate(12);
        }
        if($search->search != "") {
            $query->where('cruise_line','LIKE',"%$search->search%");
        }
        if($search->destination == "") { // search based on destination
            $query->where('destination','LIKE',"%$search->search%");
        } else {
            $query->where('destination', $search->destination );
        }
        if($search->origin == "") { // search base on port of origin
            $query->where('port_org','LIKE',"%$search->search%");
        } else {
            $query->where('port_org','=', $search->origin);
        }
        //JUST NEED SORT LOGIC
        return $query->paginate(12);

        // search based on term
        if($search->search != "" && $search->destination == "" && $search->origin == "" && $search->sort == "" ){
            return $query->where('cruise_line','LIKE',"%$search->search%")
                ->orWhere('destination','LIKE',"%$search->search%")
                ->paginate(12);
        }
        // search based destination only
        if($search->search == "" && $search->destination != "" && $search->origin == "" && $search->sort == "" ){
            return $query->where('destination',$search->destination)
                ->paginate(12);
        }
        // search based on destination and term
        if($search->search != "" && $search->destination != "" && $search->origin == "" && $search->sort == "" ){
            return $query->where('destination',$search->destination)
                ->orWhere('cruise_line','LIKE',"%$search->search%")
                ->paginate(12);
        }

        if($search->search != "" && $search->destination != "" && $search->origin != "" && $search->sort == "" ){
            return $query->where('cruise_line','LIKE',"%$search->search%")
                ->orWhere('destination',$search->destination)
                ->paginate(12);
        }
        if($search->search == "" && $search->destination == "" && $search->origin == "" && $search->sort == "" ){
            return $query->paginate(12);
        }
    }

}
