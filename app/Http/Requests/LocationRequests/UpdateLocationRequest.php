<?php

namespace App\Http\Requests\LocationRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLocationRequest extends FormRequest
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
            'name' => ['sometimes', 'string' , 'max:100' ,
                Rule::unique('locations')->ignore($data['id'])->whereNull('deleted_at')
            ],
            'code' => ['sometimes', 'string'  ,
                Rule::unique('locations')->ignore($data['id'])->whereNull('deleted_at')
            ],
        ];
    }
}
