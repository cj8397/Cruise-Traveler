<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Event extends Model
{
    //
    public $timestamps = false;
    protected $table = 'events';
    protected $fillable = [
        'sailing_id', 'title', 'start_date', 'end_date', 'desc', 'location','max_participants'
    ];

    public function userevent()
    {
        return $this->hasMany('App\UserEvent');
    }

    public function sailing()
    {
        return $this->belongsTo('App\Sailing');
    }

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
    public function scopeSearch($query, $search){

        if ($search->search == null && $search->direction == null && $search->sort == null) {
             $query->paginate(6);
        }else {
            $query->where('title', 'LIKE', "%$search->search%");
            if ($search->direction != "" || $search->sort != "") {
                $query->orderBy($search->sort, $search->direction);
            }
            return $query->paginate(6);
        }
    }
}
