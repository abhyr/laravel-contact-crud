<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'contact' => [
                'required',
                'regex:/^[\d\s\-\+()]{10,20}$/',
                'unique:users,contact' 
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'contact.required' => 'Contact number is required.',
            'contact.digits_between' => 'Contact must be 10-15 digits.',
            'contact.unique' => 'This contact number is already in use.',
        ];
    }
}
