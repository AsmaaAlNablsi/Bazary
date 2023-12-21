<?php

namespace App\Http\Controllers;

use App\Traits\GeneralSearch;
use App\Traits\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, JsonResponse, GeneralSearch;

    /**
     * @return false|string
     */
    public function switchLang(): false|string
    {
        if (app()->getLocale() == 'ar') {
            app()->setLocale('en');
            session()->put('locale', 'en');
        } else {
            app()->setLocale('ar');
            session()->put('locale', 'ar');
        }
        return self::jsonResponse('success');
    }
}
