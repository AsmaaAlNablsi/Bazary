<?php

namespace App\Exceptions\MobileExceptions;

use App\Traits\MobileResponse;
use Exception;

class BaseException extends Exception
{
    use MobileResponse;
}
