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
            'first' => 'required|max:20',
            'last' => 'required|max:20',
            'dob' => 'required|date_format:Y/m/d',
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
            'two' => 'integer|min:0',
             'five' => 'integer|min:0',
              'twelve' => 'integer|min:0',
               'seventeen' => 'integer|min:0',
                'twentyfour' => 'integer|min:0',
                 'twentynine' => 'integer|min:0',
                  'thirtynine' => 'integer|min:0',
            'fourtynine' => 'integer|min:0',
             'fiftynine' => 'integer|min:0',
              'seventyfour' => 'integer|min:0',
               'seventyfive' => 'integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'first.required' => 'Please enter your first name!',
            'last.required' => 'Please enter your last name!',
            'dob.required' => 'Please enter your birth date!',
            'dob.date_format' => 'Please use the YYYY/MM/DD format!',
            'sex.required' => 'Please specify your gender!',
            'lang.required' => 'Please enter your primary language!',
            'country.required' => 'Please enter your country!',
            'family.required' => 'Please specify if you have family!',
            'city.required' => 'Please enter your city!',
            'two.min' => 'Please enter a number greater than -1!',
             'five.min' => 'Please enter a number greater than -1!',
              'twelve.min' => 'Please enter a number greater than -1!',
               'seventeen.min' => 'Please enter a number greater than -1!',
                'twentyfour.min' => 'Please enter a number greater than -1!',
                 'twentynine.min' => 'Please enter a number greater than -1!',
                  'thirtynine.min' => 'Please enter a number greater than -1!',
            'fourtynine.min' => 'Please enter a number greater than -1!',
             'fiftynine.min' => 'Please enter a number greater than -1!',
              'seventyfour.min' => 'Please enter a number greater than -1!',
               'seventyfive.min' => 'Please enter a number greater than -1!'
        ];
    }
}
