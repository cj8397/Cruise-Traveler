<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserDetails extends Model
{
  public $timestamps = false;
    protected $table = 'user_details';

    protected $fillable = ['user_id',
        'first', 'last', 'dob', 'age', 'sex', 'lang','ethinicity','hobby','family','country', 'region',
        'city', 'address', 'co_travellers', 'two', 'five', 'twelve', 'seventeen', 'twentyfour', 'twentynine', 'thirtynine',
        'fourtynine', 'fiftynine', 'seventyfour', 'seventyfive' ];


    public function usersailings()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevents()
    {
        return $this->belongsToMany('App\UserEvent');
    }

    public function getAge() {
        return Carbon::parse($this->dob)->age;
    }

}
