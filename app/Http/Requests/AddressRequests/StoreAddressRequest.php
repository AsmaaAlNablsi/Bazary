<?php

namespace App\Http\Requests\AddressRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAddressRequest extends FormRequest
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
            'parent_id'   => 'sometimes|exists:addresses,id|integer',
            'name_ar' => ['required', 'string' , 'max:100' ,
                Rule::unique('addresses')->whereNull('deleted_at')
            ],
            'name_en' => ['required', 'string' , 'max:100' ,
                Rule::unique('addresses')->whereNull('deleted_at')
            ],
            'is_active'   => 'sometimes|boolean',
        ];
    }
}
