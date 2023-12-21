<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            if ($request->wantsJson()) {
                $locale = $request->getPreferredLanguage() ?? config('app.locale', 'ar');
                App::setLocale($locale);
                session()->keep(['locale' => $locale]);
            } else {
                App::setLocale(config('app.locale'));
                session()->keep(['locale' => config('app.locale')]);
            }
        }
        return $next($request);
    }
}
