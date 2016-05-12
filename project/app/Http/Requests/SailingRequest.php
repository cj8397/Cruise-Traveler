<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class SailingRequest extends Request
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
            'cruise_line' => 'required|max:20',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'port_org' => 'required|max:30',
            'port_dest' => 'required|max:30',
            'destination' => 'required|max:20'
        ];
    }

    public function messages()
    {
        return [
            'cruise_line.required' => 'Please assign a Cruise Line?',
            'start.required' => 'When does the Sailing start?',
            'end.required' => 'When does the Sailing end?',
            'port_org.required' => 'From what port does your sailing start?',
            'port_dest.required' => 'From what port does your sailing end?',
            'destination.required' => 'What is the main destination of this sailing?'
        ];
    }
}
