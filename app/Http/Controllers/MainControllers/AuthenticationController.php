<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return false|string
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $authenticated = Auth::attempt($request->all());
        if ($authenticated) {
            $user = auth()->user();
            $res = $user->tokenize();
            return self::jsonResponse('success', $res);
        }
        throw ValidationException::withMessages(['password' => trans('auth.invalid_credentials')]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function logout(Request $request)
    {
        User::logout();
        return self::jsonResponse('success');
    }

}
