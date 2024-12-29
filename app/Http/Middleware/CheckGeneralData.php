<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\General;

class CheckGeneralData
{
    public function handle(Request $request, Closure $next)
    {
        // Check if General data exists
        if (!General::exists()) {
            // Redirect to wizard form
            return redirect()->route('installation.index')->with('warning', __('Please complete the general settings first.'));
        }

        return $next($request);
    }
}
