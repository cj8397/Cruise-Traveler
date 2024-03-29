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
            'desc' => 'required|max:255',
            'location' => 'required|max:80',
            'max_participants' => 'required|numeric|between:0,100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please assign a title to your event!',
            'start.required' => 'When is your event starting?',
            'desc.required' => 'Please enter some event details!',
            'location.required' => 'Where is your event located?',
            'end.required' => 'When is your event ending?',
            'sailing_id.exists' => 'This Sailing doesn\'t exist anymore or has expired!',
            'max_participants.between' =>'The number of participants entered is incorrect, Enter a number between 1-100'
        ];
    }
}
