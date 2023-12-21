<?php

namespace App\Http\Controllers\MobileControllers\Auth;

use App\Http\Controllers\MobileControllers\BaseController;
use App\Http\Requests\MobileRequests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends BaseController
{

    public function login(LoginRequest $request)
    {
        $user = User::whereMobile($request->mobile)->firstOrFail();
        $authenticated = Auth::attempt(['email' => $user->email, 'password' => $request->password]);
        if ($authenticated) {
            $user = auth()->user();
            return self::mobileResponse('success', $user->tokenize());
        }
        throw ValidationException::withMessages(['password' => trans('auth.invalid_credentials')]);
    }


    public function logout()
    {
        User::logout();
        return self::mobileResponse('success');
    }

}
