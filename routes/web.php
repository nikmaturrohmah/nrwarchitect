<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

//profile
Route::get('dataprofile', [ProfileController::class, 'profile']);
Route::get('/profile/cari', [ProfileController::class, 'profile']);
Route::get('profile/tambahprofile', [ProfileController::class, 'tambahprofile']);
Route::get('/profile/simpan', [ProfileController::class, 'simpan']);
Route::get('profile/edit/{id_profile}', [ProfileController::class, 'edit']);
route::get('profile/update/{id_profile}',[ProfileController::class, 'update']);
Route::get('profile/softdel/{id}', [ProfileController::class, 'softdel']);