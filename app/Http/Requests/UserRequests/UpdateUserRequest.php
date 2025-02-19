<?php

namespace App\Http\Requests\UserRequests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends BaseRequest
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
            'first_name' => 'sometimes',
            'last_name' => 'sometimes',
            'password' => ['sometimes','nullable', Password::min(8)->max(20)->letters()->numbers()->mixedCase()->symbols()],
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($this->user)->whereNull('deleted_at')],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['bail', 'string', 'exists_ignore_deleted:roles,name']
        ];
    }

}
