<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddEvent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:0,50',
            'date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the event name',
            'name.between' => 'The name needs to be between 0 and 50 characters.',
            'date.required' => 'When will this event be?'
        ];
    }
}
