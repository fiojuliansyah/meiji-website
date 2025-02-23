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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

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
        if (!Auth::user()->can('view-dashboard')) {
            return redirect()->route('approvals.index');
        }
        
        $userCount = User::count();
        $sliderCount = Slider::count();
        $newsCount = News::count();
        $pageCount = Page::count();
        $productCount = Product::count();
    
        $visitors = DB::table('shetabit_visits as v1')
            ->join(DB::raw('(SELECT ip, url, MAX(created_at) as max_created_at
                    FROM shetabit_visits 
                    GROUP BY ip, url) as v2'), function($join) {
                $join->on('v1.ip', '=', 'v2.ip')
                     ->on('v1.url', '=', 'v2.url')
                     ->on('v1.created_at', '=', 'v2.max_created_at');
            })
            ->select('v1.ip', 'v1.url', 'v1.method', 'v1.platform', 'v1.browser', 'v1.created_at')
            ->orderBy('v1.created_at', 'desc')
            ->paginate(10);
    
        foreach ($visitors as $visitor) {
            if ($locationData = Location::get($visitor->ip)) {
                $visitor->location = [
                    'country' => $locationData->countryName,
                    'city' => $locationData->cityName,
                    'region' => $locationData->regionName,
                    'latitude' => $locationData->latitude,
                    'longitude' => $locationData->longitude
                ];
            }
        }
    
        return view('dashboard', [
            'userCount' => $userCount,
            'sliderCount' => $sliderCount,
            'newsCount' => $newsCount,
            'pageCount' => $pageCount,
            'productCount' => $productCount,
            'visitors' => $visitors,
        ]);
    }
    
}
