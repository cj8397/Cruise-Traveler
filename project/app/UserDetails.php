<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserDetails extends Model
{
    public $timestamps = false;
    protected $table = 'user_details';

    protected $fillable = ['user_id',
        'first', 'last', 'dob', 'sex', 'lang', 'ethinicity', 'hobby', 'family', 'country', 'region',
        'city', 'address', 'co_travellers', '0-2', '3-5', '6-12', '13-17', '18-24', '25-29', '30-39',
        '40-49', '50-59', '60-74', '75+'];


    public function usersailings()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevents()
    {
        return $this->belongsToMany('App\UserEvent');
    }

    public function getAge()
    {
        return Carbon::parse($this->dob)->age;
    }

}
