<?php

namespace App\Traits;


use Illuminate\Http\Response;

trait JsonResponse
{
    public static function jsonResponse($message, $data = null, $code = Response::HTTP_OK)
    {
        $response = [
            'message' => trans('messages.' . $message),
            'data' => $data
        ];
        return json_encode($response, $code);
    }
}
