<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\frontpage\AnimalHealthController;
use App\Http\Controllers\frontpage\CareerController;
use App\Http\Controllers\frontpage\CompanyHistoryController;
use App\Http\Controllers\frontpage\CompanyProfileController;
use App\Http\Controllers\frontpage\ConsumerHealthController;
use App\Http\Controllers\frontpage\ContactController;
use App\Http\Controllers\frontpage\FaqController;
use App\Http\Controllers\frontpage\OtherInformationController;
use App\Http\Controllers\frontpage\PrescriptionProductController;
use App\Http\Controllers\frontpage\PressConferenceController;
use App\Http\Controllers\frontpage\PharmacovigilanceController;
use App\Http\Controllers\frontpage\CSRListController;
use App\Http\Controllers\frontpage\ProductLaunchController;
use App\Http\Controllers\frontpage\RandDActivitiesController;
use App\Http\Controllers\frontpage\TestController;
use App\Http\Controllers\frontpage\VissionMissionController;

Route::get('/', function () {
    $defaultLocale = config('app.locale', 'en');
    return redirect()->to('/' . $defaultLocale);
});

Route::prefix('{lang}')
    ->middleware(SetLocale::class)
    ->group(function () {
        Route::get('/animal-health', [AnimalHealthController::class, 'index'])->name('frontpage.animal-health');
        Route::get('/career', [CareerController::class, 'index'])->name('frontpage.career');
        Route::get('/company-history', [CompanyHistoryController::class, 'index'])->name('frontpage.company-history');
        Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('frontpage.company-profile');
        Route::get('/consumer-health', [ConsumerHealthController::class, 'index'])->name('frontpage.consumer-health');
        Route::get('/contact', [ContactController::class, 'index'])->name('frontpage.contact');
        Route::get('/faq', [FaqController::class, 'index'])->name('frontpage.faq');
        Route::get('/other-information', [OtherInformationController::class, 'index'])->name('frontpage.other-information');
        Route::get('/prescription-product', [PrescriptionProductController::class, 'index'])->name('frontpage.prescription-product');
        Route::get('/press-conference', [PressConferenceController::class, 'index'])->name('frontpage.press-conference');
        Route::get('/product-launch', [ProductLaunchController::class, 'index'])->name('frontpage.product-launch');
        Route::get('/r-and-d', [RandDActivitiesController::class, 'index'])->name('frontpage.r-and-d');
        // Route::get('/test', [TestController::class, 'index'])->name('frontpage.test');
        Route::get('/csr-list', [CSRListController::class, 'index'])->name('frontpage.csr');
        Route::get('/pharmacovigilance', [PharmacovigilanceController::class, 'index'])->name('frontpage.pharmacovigilance');
        Route::get('/vision-mission', [VissionMissionController::class, 'index'])->name('frontpage.vision-mission');
        Route::post('/change-language', [DashboardController::class, 'changeLanguage'])->name('change-language');
        Route::middleware('auth')->prefix('manage')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('languages', LanguageController::class)->except(['destroy']);
            Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
            Route::get('languages/{id}/translations', [TranslationController::class, 'index'])->name('languages.translations');
            Route::put('translations/update-multiple', [TranslationController::class, 'updateMultiple'])->name('translations.update_multiple');
        });
});

Auth::routes();
