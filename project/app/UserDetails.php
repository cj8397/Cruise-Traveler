<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserDetails extends Model
{
<<<<<<< HEAD
  public $timestamps = false;
    protected $table = 'user_details';

    protected $fillable = ['user_id',
        'first', 'last', 'dob', 'sex', 'lang','ethinicity','hobby','family','country', 'region',
        'city', 'address', 'co_travellers', '0-2', '3-5', '6-12', '13-17', '18-24', '25-29', '30-39',
        '40-49', '50-59', '60-74', '75+' ];
=======
    public $timestamps = false;
    protected $table = 'user_details';

    protected $fillable = ['user_id',
        'first', 'last', 'dob', 'sex', 'lang', 'ethinicity', 'hobby', 'family', 'country', 'region',
        'city', 'address', 'co_travellers', '0-2', '3-5', '6-12', '13-17', '18-24', '25-29', '30-39',
        '40-49', '50-59', '60-74', '75+'];
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b


    public function usersailings()
    {
        return $this->hasMany('App\UserSailing');
    }

    public function userevents()
    {
        return $this->hasMany('App\UserEvent');
    }

<<<<<<< HEAD
    public function getAge() {
=======
    public function getAge()
    {
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        return Carbon::parse($this->dob)->age;
    }
}
