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
            'email' => 'required|max:20',
            'password' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please assign an email to the User!',
            'password.required' => 'Please assign a password to the User!',
        ];
    }
}
