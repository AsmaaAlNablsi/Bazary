<?php

namespace App\Http\Requests\MobileRequests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyActivationRequest extends FormRequest
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
            'mobile'=>'required|digits:10|numeric',
            'activation_code'=>'required|digits:5|numeric',
        ];
    }
}
