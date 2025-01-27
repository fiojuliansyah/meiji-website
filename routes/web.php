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
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\ApprovalTypeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\Auth\MicrosoftController;
use App\Http\Controllers\frontpage\HomeController;
use App\Http\Controllers\frontpage\PageNewsController;
use App\Http\Controllers\frontpage\PageAboutController;
use App\Http\Controllers\frontpage\PageRanddController;
use App\Http\Controllers\frontpage\PageProductController;
use App\Http\Controllers\frontpage\PageActivityController;
use App\Http\Controllers\frontpage\PageFaqContactController;


    
Route::get('/install', [HomeController::class, 'install'])->name('installation.index');
Route::post('/install/complete', [HomeController::class, 'complete'])->name('installation.complete');

Route::get('/', function () {
    $defaultLocale = config('app.locale', 'en');
    return redirect()->to('/' . $defaultLocale);
});

Route::prefix('workroom')->group(function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/auth/microsoft/redirect', [MicrosoftController::class, 'redirectToMicrosoft'])->name('auth.microsoft.redirect');
    Route::get('/auth/microsoft/callback', [MicrosoftController::class, 'handleMicrosoftCallback'])->name('auth.microsoft.callback');
});

// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);

// Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
// Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

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

        Route::post('change-language', [HomeController::class, 'changeLanguage'])->name('change-language');

        Route::prefix('workroom')
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
                Route::resource('approval_types', ApprovalTypeController::class);
                Route::resource('languages', LanguageController::class)->except(['destroy']);

                Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals.index');
                Route::get('approvals/{approvableType}/{approvableId}', [ApprovalController::class, 'show'])->name('approvals.show');
                Route::post('approve/{approvableType}/{approvableId}/{approvalTypeId}', [ApprovalController::class, 'approve'])->name('approve');
                Route::post('/approvals/reject/{approvableType}/{approvableId}/{approvalTypeId}', [ApprovalController::class, 'reject'])->name('reject');
                                
                Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
                Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
                Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])->name('translations.update_multiple');
                Route::post('ckeditor/upload', [UploadController::class, 'uploadImage'])->name('ckeditor.upload');
            });
    });