<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserDetailsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first' => 'max:20',
            'last' => 'max:20',
            'dob' => 'required|date_format:Y/m/d|max:20',
            'sex' => 'required|max:20',
            'lang' => 'required|max:20',
            'country' => 'required|max:20',
            'city' => 'required|max:20',
            'region' => 'max:20',
            'address' => 'max:30',
            'ethnicity' => 'max:20',
            'hobby' => 'max:20',
            'family' => 'required|Boolean|max:20',
            'co_travellers' => 'Boolean|max:20',
            'two' => 'integer',
             'five' => 'integer',
              'twelve' => 'integer',
               'seventeen' => 'integer',
                'twentyfour' => 'integer',
                 'twentynine' => 'integer',
                  'thirtynine' => 'integer',
            'fourtynine' => 'integer',
             'fiftynine' => 'integer',
              'seventyfour' => 'integer',
               'seventyfive' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'Please enter your birth date!',
            'sex.required' => 'Please enter your sex!',
            'lang.required' => 'Please enter your primary language!',
            'country.required' => 'Please enter your Country!',
            'family.required' => 'Please enter your family!',
            'city.required' => 'Please enter your city!',
        ];
    }
}
