<?php

namespace App\Http\Requests\AddressRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAddressRequest extends FormRequest
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
            'name_ar' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('addresses')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'name_en' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('addresses')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'is_active'   => 'sometimes|boolean',
        ];
    }
}
