<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoData extends FormRequest
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
            'title_az' => 'nullable|max:500',
            'seo_title_az' => 'nullable|max:500',
            'seo_description_az' => 'nullable',
        ];
    }
}
