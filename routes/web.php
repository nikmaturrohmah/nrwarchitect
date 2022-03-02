<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/detail', [LandingController::class, 'detail'])->name('detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

Route::get('/admin/landing', [LandingController::class, 'adminIndex'])->name('admin.index');

Route::name('adminlanding.')->prefix('adminlanding')->group(function () {
    Route::get('slider', [LandingController::class, 'adminSlider'])->name('admin.slider');
    Route::post('slider/{number}', [LandingController::class, 'adminSliderUpdate'])->name('admin.slider.update');
    Route::get('aboutus', [LandingController::class, 'adminAboutus'])->name('admin.aboutus');
    Route::post('aboutus', [LandingController::class, 'adminAboutusUpdate'])->name('admin.aboutus.update');
    Route::get('contactus', [LandingController::class, 'adminContactus'])->name('admin.contactus');
    Route::post('contactus', [LandingController::class, 'adminContactusUpdate'])->name('admin.contactus.update');
    Route::get('socialmedia', [LandingController::class, 'adminSocialmedia'])->name('admin.socialmedia');
    Route::post('socialmedia', [LandingController::class, 'adminSocialmediaUpdate'])->name('admin.socialmedia.update');
});