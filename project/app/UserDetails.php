<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserDetails extends Model
{
  public $timestamps = false;
    protected $table = 'user_details';

    protected $fillable = ['user_id',
        'first', 'last', 'dob', 'sex', 'lang','ethinicity','hobby','family', 'co_travellers', 'country', 'region',
        'city', 'address'];


    public function usersailings()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevents()
    {
        return $this->hasMany('App\UserEvent');
    }

    public function getAge() {
        return Carbon::parse($this->dob)->age;
    }
}
