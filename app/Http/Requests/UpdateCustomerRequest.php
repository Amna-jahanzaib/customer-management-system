<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->customer->user)],
            'phone'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:20', Rule::unique(Customer::class)->ignore($this->customer)],
            'postcode'=>['required','min:3', 'max:50'],
            'address'=>['required','min:3', 'max:100'],
            'city'=>['required','min:3', 'max:50'],
            'country'=>['required','min:2', 'max:30'],
        ];
    }
}
