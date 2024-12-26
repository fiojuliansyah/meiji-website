<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function changeLanguage(Request $request)
    {
        $request->validate([
            'lang' => 'required|exists:languages,code',
        ]);
        
        $newLocale = $request->lang;
        $previousUrl = url()->previous();
        
        $segments = explode('/', $previousUrl);
        
        $availableLanguages = Language::pluck('code')->toArray();
        
        if (isset($segments[3]) && in_array($segments[3], $availableLanguages)) {
            $segments[3] = $newLocale;
        }
        
        $newUrl = implode('/', $segments);
        
        session(['locale' => $newLocale]);
        App::setLocale($newLocale);
    
        return redirect($newUrl);
    }
}
