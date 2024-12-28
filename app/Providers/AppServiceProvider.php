<?php

namespace App\Providers;

use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('translationhelper', function ($app) {
            return new TranslationHelper();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::defaults(['lang' => app()->getLocale()]);
    }
    
}
