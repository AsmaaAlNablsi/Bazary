<?php

namespace App\Http\Requests\GeneralCodeRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGeneralCodeRequest extends FormRequest
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
        $data = $this->request->all();
        return [
            'parent_id' => 'sometimes|exists:general_codes,id|integer',
            'level' => 'sometimes|integer',
            'description_ar' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('general_codes')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'description_en' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('general_codes')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'is_active' => 'sometimes|boolean',
        ];
    }
}
