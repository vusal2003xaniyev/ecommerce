<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoEdit extends FormRequest
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
            'old_logo_image' => 'required',
            'old_favicon_image' => 'required',
            'logo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'favicon_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ];
    }
}
