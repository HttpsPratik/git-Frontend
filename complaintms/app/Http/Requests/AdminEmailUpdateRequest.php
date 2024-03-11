<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminEmailUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
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
            'email'=>'required|email|unique:admins|max:255',
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
