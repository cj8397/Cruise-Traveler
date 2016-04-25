<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sailing extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'cruise_line','start_date','end_date','port_org','port_dest','destination'
    ];
    protected $table = 'sailings';
}
