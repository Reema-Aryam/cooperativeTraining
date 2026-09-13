<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', config('app.locale'));

        if (! in_array($locale, ['ar', 'en'], true)) {
            $locale = 'ar';
            $request->session()->forget('locale');
        }

        App::setLocale($locale);
        Date::setLocale($locale);

        return $next($request);
    }
}
