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
            'dob' => 'required|max:20',
            'sex' => 'required|max:20',
            'lang' => 'required|max:20',
            'country' => 'required|max:20',
            'ethnicity' => 'required|max:20',
            'hobby' => 'required|max:20',
            'family' => 'required|max:20',
            'co_travellers' => 'required|max:20',
            'region' => 'required|max:20',
            'city' => 'required|max:20',
            'address' => 'required|max:30'
        ];
    }

    public function messages()
    {
        return [
            'first.required' => 'Please enter your first name!',
            'last.required' => 'Please enter your last name!',
            'dob.required' => 'Please enter your birth date!',
            'sex.required' => 'Please enter your sex!',
            'lang.required' => 'Please enter your primary language!',
            'country.required' => 'Please enter your Country!',
            'ethnicity.required' => 'Please enter your ethnicity!',
            'hobby.required' => 'Please enter your hobby!',
            'family.required' => 'Please enter your family!',
            'co_travellers.required' => 'Please enter your co_travellers!',
            'region.required' => 'Please enter your region',
            'city.required' => 'Please enter your city!',
            'address.required' => 'Please enter your address!',
        ];
    }
}
