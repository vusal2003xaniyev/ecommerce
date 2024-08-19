<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmartbeeRequest extends FormRequest
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
        if(request()->routeIs('smartbeeAdd')){
            $adv_code = 'required';
            $type = 'required';
        }elseif(request()->routeIs('smartbeeEdit')){
            $adv_code = '';
            $type = '';
        };

        return [
            'adv_code' => [$adv_code,'max:250'],
            'type' => [$type]
        ];
    }
}
