<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name'    => 'required|min:3',
            'last_name'     => 'required|min:3',
            //'email' => 'required|string|email|max:255|unique:users,email,'.,
        ];
    }
       
    public function messages()
    {
        return [
            'first_name.required' => 'The First Name is required',
            'first_name.min' => 'The First Name should be minimum 3 characters',
            'last_name.required' => 'The Last Name is required',
            'last_name.min' => 'The Last Name should be minimum 3 characters',
        ];
    }
}
