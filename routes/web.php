<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RanddController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\frontpage\HomeController;
use App\Http\Controllers\frontpage\PageNewsController;
use App\Http\Controllers\frontpage\PageAboutController;
use App\Http\Controllers\frontpage\PageRanddController;
use App\Http\Controllers\frontpage\PageProductController;
use App\Http\Controllers\frontpage\PageActivityController;
use App\Http\Controllers\frontpage\PageFaqContactController;

Route::get('/', function () {
    $defaultLocale = config('app.locale', 'en');
    return redirect()->to('/' . $defaultLocale);
});

Auth::routes();

Route::prefix('{lang}')
    ->middleware(SetLocale::class)
    ->group(function () {
        // Frontend Routes
        Route::get('/', [HomeController::class, 'index'])->name('frontpage.home');
        // About Routes
        Route::get('/about/history', [PageAboutController::class, 'timeline'])->name('frontpage.timeline');
        Route::get('/about/{slug}', [PageAboutController::class, 'show'])->name('frontpage.about.show');
        
        // News Routes
        Route::get('/news/category/{slug}', [PageNewsController::class, 'category'])->name('frontpage.news.category');
        Route::get('/news/{category_slug}/{news_slug}', [PageNewsController::class, 'show'])->name('frontpage.news.show');

        // Products Routes
        Route::get('/products/category/{slug}', [PageProductController::class, 'category'])->name('frontpage.products.category');
        Route::get('/products/{category_slug}/{products_slug}', [PageProductController::class, 'show'])->name('frontpage.products.show');

        Route::get('/r&d/{slug}', [PageRanddController::class, 'show'])->name('frontpage.randd.show');

        Route::get('/activity/{slug}', [PageActivityController::class, 'show'])->name('frontpage.activity.show');

        Route::get('/faq', [PageFaqContactController::class, 'faq'])->name('frontpage.faq');
        Route::get('/contact', [PageFaqContactController::class, 'contact'])->name('frontpage.contact');
        
        // Language Switcher (moved outside admin group)
        Route::post('change-language', [DashboardController::class, 'changeLanguage'])->name('change-language');

        // Admin Routes
        Route::prefix('manage')
            ->middleware('auth')
            ->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                
                // Resource Routes
                Route::resource('sliders', SliderController::class);
                
                //Abouts
                Route::resource('abouts', AboutController::class);     
                Route::resource('timelines', TimelineController::class);
                
                //News
                Route::resource('news_categories', NewsCategoryController::class);
                Route::resource('news', NewsController::class);

                //Products
                Route::resource('categories', CategoryController::class);
                Route::resource('products', ProductController::class);

                Route::resource('randds', RanddController::class); 

                Route::resource('activities', ActivityController::class);  

                Route::resource('faqs', FaqController::class);
                Route::resource('contacts', ContactController::class);

                Route::resource('languages', LanguageController::class)->except(['destroy']);
                
                // Additional Language Routes
                Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
                Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
                Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])
                    ->name('translations.update_multiple');
                
                // CKEditor Upload Route
                Route::post('ckeditor/upload', [UploadController::class, 'uploadImage'])->name('ckeditor.upload');
            });
    });