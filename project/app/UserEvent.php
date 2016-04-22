<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    public $timestamps = false;

    protected $table = 'user_events';
    protected $fillable = [
        'user_id', 'sailing_id', 'role'
    ];
}
