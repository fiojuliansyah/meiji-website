<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Language; // Tambahkan ini

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil locale dari URL
        $segments = $request->segments();
        $locale = $segments[0] ?? null;
        
        // Cek apakah locale tersedia di database
        $availableLocales = Language::pluck('code')->toArray();
        
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        } elseif (session()->has('locale')) {
            // Jika tidak ada di URL, cek session
            $sessionLocale = session('locale');
            if (in_array($sessionLocale, $availableLocales)) {
                App::setLocale($sessionLocale);
            }
        } else {
            // Jika tidak ada di session, gunakan default language dari database
            $defaultLocale = Language::where('is_default', true)->value('code') ?? 'en';
            App::setLocale($defaultLocale);
            session()->put('locale', $defaultLocale);
        }

        return $next($request);
    }
}
