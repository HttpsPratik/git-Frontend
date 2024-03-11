<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FiscalYearUpdateRequest extends FormRequest
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
            'year' => 'required',
            'active' => ''
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Select a fiscal year',
            'year.required' => 'Please Enter Fiscal Year !!!'
        ];
    }
}
