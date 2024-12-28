<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Randd;
use App\Models\Activity;
use App\Models\Category;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $currentRoute = Route::currentRouteName();
            $routeParameters = Route::current() ? Route::current()->parameters() : [];
            
            Log::info('View Composer Data:', [
                'route' => $currentRoute,
                'parameters' => $routeParameters
            ]);
            
            try {
                $data = [
                    'currentRoute' => $currentRoute,
                    'routeParameters' => json_encode($routeParameters)
                ];

                // Load models hanya jika dibutuhkan untuk view tertentu
                if ($view->getName() === 'layouts.front' || str_starts_with($view->getName(), 'frontpage.')) {
                    $data['abouts'] = About::all();
                    $data['news_categories'] = NewsCategory::all();
                    $data['categories'] = Category::all();
                    $data['randds'] = Randd::all();
                    $data['activities'] = Activity::all();
                }

                $view->with($data);
            } catch (\Exception $e) {
                Log::error('Error in ViewServiceProvider:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
            }
        });
    }
}