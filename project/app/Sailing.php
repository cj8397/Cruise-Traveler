<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
