<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DepartmentUpdateRequest extends FormRequest
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
            'identifier' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Select a Department',
            'name.required' => 'Enter Department Name',
            'identifier.required' => 'Enter Department Identifier'
        ];
    }
}
