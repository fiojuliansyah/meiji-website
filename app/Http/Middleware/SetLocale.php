<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Language;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();
        $locale = $segments[0] ?? null;
        
        $availableLocales = Language::pluck('code')->toArray();
        
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        } elseif (session()->has('locale')) {
            $sessionLocale = session('locale');
            if (in_array($sessionLocale, $availableLocales)) {
                App::setLocale($sessionLocale);
            }
        } else {
            $defaultLocale = Language::where('is_default', true)->value('code') ?? 'en';
            App::setLocale($defaultLocale);
            session()->put('locale', $defaultLocale);
        }

        return $next($request);
    }
}
