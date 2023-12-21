<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait MobileResponse
{
    public static function mobileResponse($message, $data = null, $code = Response::HTTP_OK)
    {
        $response = [
            'message' => trans('messages.' . $message),
            'data' => $data,
        ];
        return response()->json($response, $code);
    }
}
