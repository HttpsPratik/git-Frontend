<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProcessingTicketSearchRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        if(array_key_exists('date_range_ticket', $this->input())){
            $date = explode('-', $this->input('date_range_ticket'));
            $this->merge([
                'date_from' => Str::squish($date[0]),
                'date_to' => Str::squish($date[1])
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'search_term' => '',
            'fiscal_year' => '',
            'date_to' => 'required_with:date_from|date_format:Y/m/d',
            'date_from' => 'required_with:date_to|date_format:Y/m/d'
        ];
    }
}
