<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
{
    $locale = $request->cookie('language');

    if (!$locale) {

        $browserLanguage = substr(
            $request->server('HTTP_ACCEPT_LANGUAGE'),
            0,2
        );

        if (in_array($browserLanguage, ['lv', 'en'])) {
            $locale = $browserLanguage;
        } else {
            $locale = 'lv';
        }
    }

    App::setLocale($locale);

    return $next($request);
}
}