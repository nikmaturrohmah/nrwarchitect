<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PetugasadminController;
use App\Http\Controllers\FaqController;

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

//kontak
Route::get('datakontak', [KontakController::class, 'kontak']);
Route::get('/kontak/cari', [KontakController::class, 'kontak']);
Route::get('kontak/tambahkontak', [KontakController::class, 'tambahkontak']);
Route::get('/kontak/simpan', [KontakController::class, 'simpan']);
Route::get('kontak/edit/{id_kontak}', [KontakController::class, 'edit']);
route::get('kontak/update/{id_kontak}',[KontakController::class, 'update']);
Route::get('kontak/softdel/{id}', [KontakController::class, 'softdel']);

//about
Route::get('dataabout', [AboutController::class, 'about']);
Route::get('/about/cari', [AboutController::class, 'about']);
Route::get('about/tambahabout', [AboutController::class, 'tambahabout']);
Route::get('/about/simpan', [AboutController::class, 'simpan']);
Route::get('about/edit/{id_about}', [AboutController::class, 'edit']);
route::get('about/update/{id_about}',[AboutController::class, 'update']);
Route::get('about/softdel/{id}', [AboutController::class, 'softdel']);

//faq
Route::get('datafaq', [FaqController::class, 'faq']);
Route::get('/faq/cari', [FaqController::class, 'faq']);
Route::get('faq/tambahfaq', [FaqController::class, 'tambahfaq']);
Route::get('/faq/simpan', [FaqController::class, 'simpan']);
Route::get('faq/edit/{id_faq}', [FaqController::class, 'edit']);
route::get('faq/update/{id_faq}',[FaqController::class, 'update']);
Route::get('faq/softdel/{id}', [FaqController::class, 'softdel']);

//petugasadmin
Route::get('datapetugasadmin', [PetugasadminController::class, 'petugasadmin']);
Route::get('/petugasadmin/cari', [PetugasadminController::class, 'petugasadmin']);
Route::get('petugasadmin/tambahpetugasadmin', [PetugasadminController::class, 'tambahpetugasadmin']);
Route::get('/petugasadmin/simpan', [PetugasadminController::class, 'simpan']);
Route::get('petugasadmin/edit/{id}', [PetugasadminController::class, 'edit']);
route::get('petugasadmin/update/{id}',[PetugasadminController::class, 'update']);
Route::get('petugasadmin/softdel/{id}', [PetugasadminController::class, 'softdel']);