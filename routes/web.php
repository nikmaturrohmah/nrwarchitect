<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PetugasadminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoriesController;

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
Route::get('dataportofolio', [PortofolioController::class, 'portofolio']);
Route::get('/portofolio/cari', [PortofolioController::class, 'portofolio']);
Route::get('portofolio/tambahportofolio', [PortofolioController::class, 'tambahportofolio']);
Route::get('/portofolio/simpan', [PortofolioController::class, 'simpan']);
Route::get('portofolio/edit/{id_portofolio}', [PortofolioController::class, 'edit']);
route::get('portofolio/update/{id_portofolio}',[PortofolioController::class, 'update']);
Route::get('portofolio/softdel/{id}', [PortofolioController::class, 'softdel']);

//petugasadmin
Route::get('datapetugasadmin', [PetugasadminController::class, 'petugasadmin']);
Route::get('/petugasadmin/cari', [PetugasadminController::class, 'petugasadmin']);
Route::get('petugasadmin/tambahpetugasadmin', [PetugasadminController::class, 'tambahpetugasadmin']);
Route::get('/petugasadmin/simpan', [PetugasadminController::class, 'simpan']);
Route::get('petugasadmin/edit/{id}', [PetugasadminController::class, 'edit']);
route::get('petugasadmin/update/{id}',[PetugasadminController::class, 'update']);
Route::get('petugasadmin/softdel/{id}', [PetugasadminController::class, 'softdel']);

//testimonial
Route::get('datatestimonial', [TestimonialController::class, 'testimonial']);
Route::get('/testimonial/cari', [TestimonialController::class, 'testimonial']);
Route::get('testimonial/tambahtestimonial', [TestimonialController::class, 'tambahtestimonial']);
Route::post('/testimonial/simpan', [TestimonialController::class, 'simpan']);
Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit']);
route::get('testimonial/update/{id}',[TestimonialController::class, 'update']);
Route::get('testimonial/softdel/{id}', [TestimonialController::class, 'softdel']);

//categories
Route::get('datacategories', [categoriesController::class, 'categories']);
Route::get('/categories/cari', [categoriesController::class, 'categories']);
Route::get('categories/tambahcategories', [categoriesController::class, 'tambahcategories']);
Route::get('/categories/simpan', [categoriesController::class, 'simpan']);
Route::get('categories/edit/{id}', [categoriesController::class, 'edit']);
route::get('categories/update/{id}',[categoriesController::class, 'update']);
Route::get('categories/softdel/{id}', [categoriesController::class, 'softdel']);