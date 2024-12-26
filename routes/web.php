<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'manage'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});