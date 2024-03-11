<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OpenTicketUpdateRequest extends FormRequest
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
        $rules = [
            'id' => 'required',
            'category_id' => 'required',
        ];

        if(Ticket::where('id', $this->input('id'))->where('subject', null)->exists()){
            $rules = array_merge($rules, ['subject' => 'required']);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Select a Category ',
            'subject.required' => 'Subject cannot be empty'
        ];
    }
}
