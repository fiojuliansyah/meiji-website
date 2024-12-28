<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

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
        $newLang = $request->input('lang');
    
        // Set locale baru
        app()->setLocale($newLang);
        session()->put('locale', $newLang);
    
        // Redirect ke halaman home setelah ganti bahasa
        return redirect()->route('frontpage.home', ['lang' => $newLang]);
    }    
}
