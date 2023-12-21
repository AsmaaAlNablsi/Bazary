<?php

namespace App\Http\Requests\RoleRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name_ar'=>['sometimes','string'],
            'name_en'=>['sometimes','string', Rule::unique('roles')->ignore($this->role)],
            'permissions'=>['required','array','min:1'],
            'permissions.*'=>['bail','string','exists:permissions,name']
        ];
    }
}
