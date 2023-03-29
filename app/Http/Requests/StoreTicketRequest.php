<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'customer_name' => ['required','string','max:255'],
            'email'         => ['required','email','max:255'],
            'phone_number'  => ['required','string','max:15','min:5'],
            'description'   => ['required','string','min:5'],
        ];
    }

    public function messages() : array
    {
        return [
            'customer_name.required' => 'Please Enter Your Name',
            'customer_name.max'      => "The Name must be at least :max characters",
            'email.required' => 'Please Enter Your Email',
            'phone_number.required' => 'Please Enter Your Mobile Number',
            'description.required' => 'Please Describe Your Problem',
        ];
    }
}
