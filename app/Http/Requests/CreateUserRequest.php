<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'login' => ['required', 'string', 'min:3', 'max:50'],
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'password' => ['required', 'string', 'min:3', 'max:15'],
            'email' => ['required', 'string', 'min:5', 'max:50'],
            'phone' => ['required', 'string', 'min:8', 'max:12'],
        ];
    }
}
