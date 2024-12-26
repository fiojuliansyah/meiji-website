<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil bahasa dari segment pertama URL
        $locale = $request->segment(1);
        
        // Ambil daftar bahasa yang valid dari database
        $validLocales = \App\Models\Language::pluck('code')->toArray();
        
        // Jika locale ada di URL dan valid
        if ($locale && in_array($locale, $validLocales)) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        } 
        // Jika locale tidak valid atau tidak ada
        else {
            // Redirect ke URL dengan default locale
            $defaultLocale = config('app.locale', 'id');
            
            // Gabungkan semua segment URL kecuali yang pertama (jika ada)
            $segments = $request->segments();
            array_shift($segments); // Hapus segment pertama jika ada
            $redirectUrl = $defaultLocale . '/' . implode('/', $segments);
            
            return redirect($redirectUrl);
        }

        return $next($request);
    }
}