<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSailing extends Model
{

    public $timestamps = false;

    protected $table = 'user_sailings';
    protected $fillable = [
        'user_id', 'sailing_id'
    ];

}
