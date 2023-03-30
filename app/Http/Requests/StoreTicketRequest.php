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
            'customer_name' => ['required','string','max:255','min:5'],
            'email'         => ['required','email','max:255'],
            'phone_number'  => ['required','string','max:15','min:5'],
            'description'   => ['required','string','min:5'],
        ];
    }

    public function messages() : array
    {
        return [
            'customer_name.required' => 'Please Enter Your Name',
            'customer_name.max'      => "The Name must be maximum :max characters",
            'customer_name.min'      => "The Name must be at least :min characters",

            'email.required' => 'Please Enter Your Email',
            'email.email' => 'Please Enter Valid Email Address',

            'phone_number.required' => 'Please Enter Your Mobile Number',
            'phone_number.min' => 'Please Enter Valid Mobile Number',
            'phone_number.max' => 'Please Enter Valid Mobile Number',

            'description.required' => 'Please Describe Your Problem',
            'description.min' => 'Please describe your problem in at least :min characters',
        ];
    }
}
