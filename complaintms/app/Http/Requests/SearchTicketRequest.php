<?php

namespace App\Http\Requests;

use App\Models\AnonymousTicket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchTicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $ticket_exists = AnonymousTicket::where('ticket_number', $this->input('ticket_number'))->exists();
        
        $rules = [
            'ticket_number' => ['required', "data_exists:$ticket_exists"],
        ];

        if ($ticket_exists) {
            $rules = [ ...$rules, 'password' => ['required', 'match_ticket_password:' . $this->input('ticket_number')] ];
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'ticket_number.data_exists' => 'Ticket Not Found',
            'ticket_number.required' => 'ticket number is required',
            'password.required' => 'password is required',
            'password.match_ticket_password' => 'Wrong Password'
        ];
    }
}
