<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PetugasadminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PortofolioImageController;
use App\Http\Controllers\PortofolioSpecificationController;
use App\Http\Controllers\PortofolioTagsController;
use App\Http\Controllers\SliderController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

Route::get('/admin/landing', [LandingController::class, 'adminIndex'])->name('admin.index');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::name('landing.')->prefix('landing')->group(function () {
        Route::get('slider', [LandingController::class, 'adminSlider'])->name('slider');
        Route::post('slider/{number}', [LandingController::class, 'adminSliderUpdate'])->name('slider.update');

        Route::name('slider.')->prefix('slideradmin')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::get('create', [SliderController::class, 'create'])->name('create');
            Route::get('edit/{id}', [SliderController::class, 'edit'])->name('edit');
            Route::post('store', [SliderController::class, 'store'])->name('store');
            Route::post('dropzone', [SliderController::class, 'dropzone'])->name('dropzone');
            route::post('update/{id}',[SliderController::class, 'update'])->name('update');
            Route::get('delete/{id}', [SliderController::class, 'delete'])->name('delete');
            Route::get('publish/{id}', [SliderController::class, 'publish'])->name('publish');
            Route::get('draft/{id}', [SliderController::class, 'draft'])->name('draft');
        });
    
        Route::get('aboutus', [LandingController::class, 'adminAboutus'])->name('aboutus');
        Route::post('aboutus', [LandingController::class, 'adminAboutusUpdate'])->name('aboutus.update');
        Route::post('dropzone', [LandingController::class, 'dropzone'])->name('dropzone');
    
        Route::get('contactus', [LandingController::class, 'adminContactus'])->name('contactus');
        Route::post('contactus', [LandingController::class, 'adminContactusUpdate'])->name('contactus.update');
    
        Route::get('socialmedia', [LandingController::class, 'adminSocialmedia'])->name('socialmedia');
        Route::post('socialmedia', [LandingController::class, 'adminSocialmediaUpdate'])->name('socialmedia.update');
    
        Route::get('logo', [LandingController::class, 'adminLogo'])->name('logo');
        Route::post('logo', [LandingController::class, 'adminLogoUpdate'])->name('logo.update');
    });

    Route::name('testimonial.')->prefix('testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('create', [TestimonialController::class, 'create'])->name('create');
        Route::post('store', [TestimonialController::class, 'store'])->name('store');
        Route::post('dropzone', [TestimonialController::class, 'dropzone'])->name('dropzone');
        Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        route::post('update/{id}',[TestimonialController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TestimonialController::class, 'delete'])->name('delete');
        Route::get('publish/{id}', [TestimonialController::class, 'publish'])->name('publish');
        Route::get('draft/{id}', [TestimonialController::class, 'draft'])->name('draft');
    });

    Route::name('portofolio.')->prefix('portofolio')->group(function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('index');
        Route::get('create', [PortofolioController::class, 'create'])->name('create');
        Route::post('store', [PortofolioController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PortofolioController::class, 'edit'])->name('edit');
        route::post('update/{id}',[PortofolioController::class, 'update'])->name('update');
        route::get('detail/{id}',[PortofolioController::class, 'detail'])->name('detail');
        Route::get('delete/{id}', [PortofolioController::class, 'delete'])->name('delete');

        Route::name('image.')->prefix('image')->group(function () {
            Route::get('create/{id}', [PortofolioImageController::class, 'create'])->name('create');
            Route::post('store/{id}', [PortofolioImageController::class, 'store'])->name('store');
            Route::post('dropzone/{id}', [PortofolioImageController::class, 'dropzone'])->name('dropzone');
            Route::get('edit/{imageId}', [PortofolioImageController::class, 'edit'])->name('edit');
            route::post('update/{imageId}',[PortofolioImageController::class, 'update'])->name('update');
            Route::get('delete/{imageId}', [PortofolioImageController::class, 'delete'])->name('delete');
        });

        Route::name('spesifikasi.')->prefix('spesifikasi')->group(function () {
            Route::get('create/{id}', [PortofolioSpecificationController::class, 'create'])->name('create');
            Route::post('store/{id}', [PortofolioSpecificationController::class, 'store'])->name('store');
            Route::get('edit/{id}', [PortofolioSpecificationController::class, 'edit'])->name('edit');
            route::post('update/{id}',[PortofolioSpecificationController::class, 'update'])->name('update');
        });

        Route::name('tags.')->prefix('tags')->group(function () {
            Route::get('create/{id}', [PortofolioTagsController::class, 'create'])->name('create');
            Route::post('store/{id}', [PortofolioTagsController::class, 'store'])->name('store');
            Route::get('edit/{tagId}', [PortofolioTagsController::class, 'edit'])->name('edit');
            route::post('update/{tagId}',[PortofolioTagsController::class, 'update'])->name('update');
            Route::get('delete/{tagId}', [PortofolioTagsController::class, 'delete'])->name('delete');
        });
    });
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
