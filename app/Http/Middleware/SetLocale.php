<?php

namespace App\Http\Middleware;
use Config;
use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $segments = $request->segments();
        $locale = $segments[0];

        if (!in_array($locale, Config::get('app.available_locales'))) {
            $locale = Config::get('app.fallback_locale');
        }

        App::setLocale($locale);
        Config::set('app.locale', $locale);

        return $next($request);
    }
}
