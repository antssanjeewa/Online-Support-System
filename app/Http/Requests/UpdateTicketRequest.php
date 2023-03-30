<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "message" => ['required','string','min:5']
        ];
    }

    public function messages() : array
    {
        return [
            'message.required' => 'Please Enter Your Reply',
            'message.min'      => "The Reply must be at least :min characters",
        ];
    }
}
