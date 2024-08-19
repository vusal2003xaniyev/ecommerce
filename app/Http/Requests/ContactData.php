<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactData extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'contact_id' => 'nullable',
            'email' => 'nullable|email|max:250',
            'phones' => 'nullable',
            'address' => 'nullable',
            'address_link' => 'nullable|url',
        ];
    }
}
