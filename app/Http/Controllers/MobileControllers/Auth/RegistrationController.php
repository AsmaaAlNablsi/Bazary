<?php

namespace App\Http\Controllers\MobileControllers\Auth;

use App\Http\Controllers\MobileControllers\BaseController;
use App\Http\Requests\MobileRequests\ActivationCodeRequest;
use App\Http\Requests\MobileRequests\VerifyActivationRequest;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Models\ActivationCode;
use App\Models\User;

class RegistrationController extends BaseController
{

    public function register(StoreUserRequest $request)
    {
        $user = User::add($request);
        return self::mobileResponse('success', $user);
    }

    public function generateActivationCode(ActivationCodeRequest $request)
    {
        $data = ActivationCode::generateCode($request->mobile);
        return self::mobileResponse('success', $data);
    }

    public function verifyActivation(VerifyActivationRequest $request)
    {
        ActivationCode::verifyActivation($request->all());
        return self::mobileResponse('code_verified');
    }

}
