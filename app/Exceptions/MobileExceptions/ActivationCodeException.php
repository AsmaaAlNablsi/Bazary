<?php

namespace App\Exceptions\MobileExceptions;

use Illuminate\Http\Response;

class ActivationCodeException extends BaseException
{
    public function render($request)
    {
        return self::mobileResponse($this->getMessage(), NULL, Response::HTTP_NOT_FOUND);
    }
}
