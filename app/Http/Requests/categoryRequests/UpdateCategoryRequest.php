<?php

namespace App\Http\Requests\categoryRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $data = $this->request->all();
        return [
            'name_ar' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('locations')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'name_en' => ['sometimes', 'string'  ,
                Rule::unique('locations')->ignore($data['id'])->whereNull('deleted_at')
            ],
        ];
    }
}
