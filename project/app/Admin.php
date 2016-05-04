<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'user_id'
    ];
    protected $table = 'admin';

}
