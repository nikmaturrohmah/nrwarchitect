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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleImageController;
use App\Http\Controllers\ArticleTagsController;


Route::get('/', [LandingController::class, 'index']);
Route::get('/list', [LandingController::class, 'list'])->name('list');
Route::get('/gg', [LandingController::class, 'gg']);
Route::get('/article', [LandingController::class, 'article']);
Route::get('/article/{slug}', [LandingController::class, 'articleDetail'])->name('article.detail');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

Route::middleware('auth')->get('/admin/landing', [LandingController::class, 'adminIndex'])->name('admin.index');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
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

    Route::name('petugasadmin.')->prefix('petugasadmin')->group(function () {
        Route::get('/', [PetugasadminController::class, 'index'])->name('index');
        Route::get('create', [PetugasadminController::class, 'create'])->name('create');
        Route::post('store', [PetugasadminController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PetugasadminController::class, 'edit'])->name('edit');
        route::post('update/{id}',[PetugasadminController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PetugasadminController::class, 'delete'])->name('delete');

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

        Route::name('article.')->prefix('article')->group(function () {
            Route::get('/', [ArticleController::class, 'index'])->name('index');
            Route::get('create', [ArticleController::class, 'create'])->name('create');
            Route::post('store', [ArticleController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('edit');
            route::post('update/{id}',[ArticleController::class, 'update'])->name('update');
            route::get('detail/{id}',[ArticleController::class, 'detail'])->name('detail');
            Route::get('delete/{id}', [ArticleController::class, 'delete'])->name('delete');
    
            Route::name('image.')->prefix('image')->group(function () {
                Route::get('create/{id}', [ArticleImageController::class, 'create'])->name('create');
                Route::post('store/{id}', [ArticleImageController::class, 'store'])->name('store');
                Route::post('dropzone/{id}', [ArticleImageController::class, 'dropzone'])->name('dropzone');
                Route::get('edit/{imageId}', [ArticleImageController::class, 'edit'])->name('edit');
                route::post('update/{imageId}',[ArticleImageController::class, 'update'])->name('update');
                Route::get('delete/{imageId}', [ArticleImageController::class, 'delete'])->name('delete');
            });
    
            Route::name('tags.')->prefix('tags')->group(function () {
                Route::get('create/{id}', [ArticleTagsController::class, 'create'])->name('create');
                Route::post('store/{id}', [ArticleTagsController::class, 'store'])->name('store');
                Route::get('edit/{tagId}', [ArticleTagsController::class, 'edit'])->name('edit');
                route::post('update/{tagId}',[ArticleTagsController::class, 'update'])->name('update');
                Route::get('delete/{tagId}', [ArticleTagsController::class, 'delete'])->name('delete');
            });
        });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

