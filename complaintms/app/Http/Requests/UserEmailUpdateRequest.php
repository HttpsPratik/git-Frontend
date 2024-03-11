<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserEmailUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'email'=>'required|email|unique:users|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Select a User',
            'email.required' => 'Enter a email',
            'email.email' => 'Invalid email format'
        ];
    }
}
