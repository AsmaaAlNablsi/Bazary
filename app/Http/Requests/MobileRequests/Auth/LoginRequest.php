<?php

namespace App\Http\Requests\MobileRequests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
            'mobile' => ['required', 'numeric', 'digits:10', 'exists:users,mobile',
                function ($attribute, $value, $fail) {
                    $user = User::whereMobile($this->mobile)->whereIsActive(true)
                        ->first();
                    if (!$user)
                        $fail(trans('validation.exists'));
                }
            ],
            'password' => ['required', Password::min(8)->mixedCase()->symbols()],
        ];
    }
}
