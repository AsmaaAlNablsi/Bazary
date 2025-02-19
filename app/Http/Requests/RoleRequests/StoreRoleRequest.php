<?php

namespace App\Http\Requests\RoleRequests;

use App\Http\Requests\BaseRequest;

class StoreRoleRequest extends BaseRequest
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
            'name_ar'=>['required','string', 'max:50'],
            'name'=>['required','string','unique_ignore_deleted:roles,name', 'max:50'],
            'permissions'=>['required','array','min:1'],
            'permissions.*'=>['bail','string','exists:permissions,name']
        ];
    }
}
