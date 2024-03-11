<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RoleUpdateRequest extends FormRequest
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
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Select a role',
            'name.required' => 'Enter Name',
            'role.required' => 'Enter Role',
            'description.required' => 'Enter Description'
        ];
    }
}
