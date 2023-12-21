<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'password' => ['sometimes','nullable', Password::min(8)->mixedCase()->symbols()],
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($this->user)],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['bail', 'string', 'exists:roles,name']
        ];
    }

}
