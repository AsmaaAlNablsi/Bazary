<?php

namespace App\Http\Requests\GeneralCodeRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGeneralCodeRequest extends FormRequest
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
            'parent_id' => 'required|exists:general_codes,id|integer',
            'level' => 'sometimes|integer',
            'description_ar' => ['required', 'string' , 'max:100' ,
                Rule::unique('general_codes')->whereNull('deleted_at')
            ],
            'description_en' => ['required', 'string' , 'max:100' ,
                Rule::unique('general_codes')->whereNull('deleted_at')
            ],
            'is_active' => 'required|boolean',
        ];
    }
}
