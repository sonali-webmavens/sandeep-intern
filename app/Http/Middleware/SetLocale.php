<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // if ($request->has('lang') && in_array($request->lang, config('app.available_locales'))) {
        //     // Store selected language in session
        //     session(['locale' => $request->lang]);
        //     App::setLocale($request->lang);
        // } else {
        //     // If no or invalid language is provided, fallback to default locale
        //     App::setLocale(config('app.locale'));
        // }

        if($request->session()->has("lang")){
            App::setLocale($request->session()->get("lang"));
        }
        return $next($request);
    }
}

