<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TranslationController;

Route::get('/', function () {
    $defaultLocale = config('app.locale', 'en');
    return redirect()->to('/' . $defaultLocale);
});

Route::prefix('{lang}')
    ->middleware(SetLocale::class)
    ->group(function () {
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
