<?php

namespace App\Http\Requests\UserRequests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends BaseRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'unique_ignore_deleted:users,email'],
            'password' => ['required', Password::min(8)->max(20)->mixedCase()->symbols()],
            'roles' => ['sometimes', 'array'],
            'roles.*' => ['bail', 'string', 'exists_ignore_deleted:roles,name']
        ];
    }


}
