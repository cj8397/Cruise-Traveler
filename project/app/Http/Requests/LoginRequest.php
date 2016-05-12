<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends Request
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
            'email' => 'required|email|min:6|max:30',
            'password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter an email address!',
            'password.required' => 'Please enter a password!',
        ];
    }
}
