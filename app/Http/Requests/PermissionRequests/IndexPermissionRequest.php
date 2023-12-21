<?php

namespace App\Http\Requests\PermissionRequests;

use App\Http\Requests\IndexRequest;

class IndexPermissionRequest extends IndexRequest
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
        $rules = parent::rules();
        $rules['parent_id'] = 'sometimes';
        return $rules;
    }
}
