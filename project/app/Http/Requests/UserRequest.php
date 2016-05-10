<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends Request
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
            'email' => 'required|email|max:20',
            'password' => 'required|max:20',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter an email address!',
            'password.required' => 'Please enter a password!',
            'password_confirmation.required' => 'Please enter a password!'
        ];
    }
}
