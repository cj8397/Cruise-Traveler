<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'first', 'last', 'dob', 'sex', 'lang','ethinicity','hobby','family', 'co_travellers', 'country', 'region',
        'city', 'address'];
}
