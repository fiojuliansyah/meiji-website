<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'frontpage'], function () {
    Route::get('/', function () {return view('frontpage.home');})->name('frontpage.home');
    Route::get('/animal-health', [AnimalHealthController::class, 'index'])->name('frontpage.animal-health');
    Route::get('/career', [CareerController::class, 'index'])->name('frontpage.career');
    Route::get('/company-history', [CompanyHistoryController::class, 'index'])->name('frontpage.company-history');
    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('frontpage.company-profile');
    Route::get('/consumer-health', [ConsumerHealthController::class, 'index'])->name('frontpage.consumer-health');
    Route::get('/contact', [ContactController::class, 'index'])->name('frontpage.contact');
    Route::get('/faq', [FAQController::class, 'index'])->name('frontpage.faq');
    Route::get('/other-information', [OtherInformationController::class, 'index'])->name('frontpage.other-information');
    Route::get('/prescription-product', [PrescriptionProductController::class, 'index'])->name('frontpage.prescription-product');
    Route::get('/press-conference', [PressConferenceController::class, 'index'])->name('frontpage.press-conference');
    Route::get('/product-launch', [ProductLaunchController::class, 'index'])->name('frontpage.product-launch');
    Route::get('/r-and-d', [RandDController::class, 'index'])->name('frontpage.r-and-d');
    Route::get('/test', [TestController::class, 'index'])->name('frontpage.test');
    Route::get('/vision-mission', [VisionMissionController::class, 'index'])->name('frontpage.vision-mission');
});

Auth::routes();

Route::group(['prefix' => 'manage'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});
