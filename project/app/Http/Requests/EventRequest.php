<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class EventRequest extends Request
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
            'sailing_id' => 'required|exists:sailings,id',
            'title' => 'required|max:80',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'desc' => 'max:255',
            'location' => 'max:80'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please assign a title to your event!',
            'start.required' => 'When is your event starting?',
            'end.required' => 'When is your event ending?',
            'sailing_id.exists' => 'This Sailing doesn\'t exist anymore or has expired!'
        ];
    }
}
