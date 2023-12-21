<?php

namespace App\Exceptions\MobileExceptions;

use Illuminate\Http\Response;

class GeneralMobileException extends BaseException
{
    public function render($request)
    {
        return self::mobileResponse('server_exception', NULL, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
