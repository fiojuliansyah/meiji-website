<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RanddController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
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


Route::prefix('{lang}')
    ->middleware(SetLocale::class)
    ->group(function () {
        Route::get('/install', [HomeController::class, 'install'])->name('installation.index');
        Route::post('/install/complete', [HomeController::class, 'complete'])->name('installation.complete');
});

Route::get('/', function () {
    $defaultLocale = config('app.locale', 'en');
    return redirect()->to('/' . $defaultLocale);
});

Auth::routes();

Route::prefix('{lang}')
    ->middleware(SetLocale::class)
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('frontpage.home');
        Route::get('/about/history', [PageAboutController::class, 'timeline'])->name('frontpage.timeline');
        Route::get('/about/{slug}', [PageAboutController::class, 'show'])->name('frontpage.about.show');
        
        Route::get('/news/category/{slug}', [PageNewsController::class, 'category'])->name('frontpage.news.category');
        Route::get('/news/{category_slug}/{news_slug}', [PageNewsController::class, 'show'])->name('frontpage.news.show');

        Route::get('/products/category/{slug}', [PageProductController::class, 'category'])->name('frontpage.products.category');
        Route::get('/category/validate/{slug}', [PageProductController::class, 'validateCategory'])->name('frontpage.category.validate');
        Route::get('/products/{category_slug}/{products_slug}', [PageProductController::class, 'show'])->name('frontpage.products.show');
        Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

        Route::get('/r&d/{slug}', [PageRanddController::class, 'show'])->name('frontpage.randd.show');

        Route::get('/activity/{slug}', [PageActivityController::class, 'show'])->name('frontpage.activity.show');

        Route::get('/faq', [PageFaqContactController::class, 'faq'])->name('frontpage.faq');
        Route::get('/contact', [PageFaqContactController::class, 'contact'])->name('frontpage.contact');
        
        Route::get('/{slug}', [HomeController::class, 'show'])->name('frontpage.page.show');

        Route::post('change-language', [DashboardController::class, 'changeLanguage'])->name('change-language');

        Route::prefix('manage')
            ->middleware('auth')
            ->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                
                Route::resource('sliders', SliderController::class);
                Route::resource('visitors', VisitorController::class);
                
                Route::resource('abouts', AboutController::class);     
                Route::resource('timelines', TimelineController::class);
                
                Route::resource('news_categories', NewsCategoryController::class);
                Route::resource('news', NewsController::class);

                Route::resource('categories', CategoryController::class);
                Route::resource('products', ProductController::class);

                Route::resource('randds', RanddController::class); 

                Route::resource('activities', ActivityController::class);  

                Route::resource('faqs', FaqController::class);
                Route::resource('contacts', ContactController::class);
                Route::resource('pages', PageController::class);
                
                Route::resource('generals', GeneralController::class);
                Route::resource('homepages', HomePageController::class);
                Route::resource('users', UserController::class);
                Route::resource('roles', RoleController::class);
               Route::resource('languages', LanguageController::class)->except(['destroy']);
                
                Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
                Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
                Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])->name('translations.update_multiple');
                Route::post('ckeditor/upload', [UploadController::class, 'uploadImage'])->name('ckeditor.upload');
            });
    });