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
        $userCount = User::count();
        $sliderCount = Slider::count();
        $newsCount = News::count();
        $pageCount = Page::count();
        $productCount = Product::count();
    
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
    
        app()->setLocale($newLang);
        session()->put('locale', $newLang);
    
        return redirect()->back();
    }    
}
