<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\User;
use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
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
        // Mengambil data dari database
        $userCount = User::count(); // Pastikan Anda memiliki model User
        $sliderCount = Slider::count(); // Pastikan Anda memiliki model Slider
        $newsCount = News::count(); // Pastikan Anda memiliki model News
        $pageCount = Page::count(); // Pastikan Anda memiliki model Page
        $productCount = Product::count(); // Pastikan Anda memiliki model Product
    
        // Mengirim data ke view
        return view('dashboard', [
            'userCount' => $userCount,
            'sliderCount' => $sliderCount,
            'newsCount' => $newsCount,
            'pageCount' => $pageCount,
            'productCount' => $productCount,
        ]);
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
