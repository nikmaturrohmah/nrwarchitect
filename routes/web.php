<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PetugasadminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PortofolioImageController;
use App\Http\Controllers\PortofolioSpecificationController;
use App\Http\Controllers\PortofolioTagsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagsController;


Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/portofolio', [PublicController::class, 'portofolio'])->name('portofolio');
Route::get('/portofolio/detail/{id}', [PublicController::class, 'portofolioDetail'])->name('portofolio.detail');
Route::get('/article', [PublicController::class, 'article'])->name('article');
Route::get('/article/{slug}', [PublicController::class, 'articleDetail'])->name('article.detail');
Route::get('/article/search', [PublicController::class, 'articleSearch'])->name('article.search');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
    Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('dropzone', [LandingController::class, 'dropzoneHandler'])->name('dropzone.handler');

    Route::name('landing.')->prefix('landing')->group(function () {
        Route::name('slider.')->prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::get('create', [SliderController::class, 'create'])->name('create');
            Route::get('edit/{id}', [SliderController::class, 'edit'])->name('edit');
            Route::post('store', [SliderController::class, 'store'])->name('store');
            route::post('update/{id}',[SliderController::class, 'update'])->name('update');
            Route::get('delete/{id}', [SliderController::class, 'delete'])->name('delete');
            Route::get('publish/{id}', [SliderController::class, 'publish'])->name('publish');
            Route::get('draft/{id}', [SliderController::class, 'draft'])->name('draft');
        });
    
        Route::get('aboutus', [LandingController::class, 'adminAboutus'])->name('aboutus');
        Route::post('aboutus', [LandingController::class, 'adminAboutusUpdate'])->name('aboutus.update');
    
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
        Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        route::post('update/{id}',[TestimonialController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TestimonialController::class, 'delete'])->name('delete');
        Route::get('publish/{id}', [TestimonialController::class, 'publish'])->name('publish');
        Route::get('draft/{id}', [TestimonialController::class, 'draft'])->name('draft');
    });

    Route::name('admin.')->prefix('admin')->group(function () {
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
        route::get('publish/{id}',[ArticleController::class, 'publish'])->name('publish');
        route::get('draft/{id}',[ArticleController::class, 'draft'])->name('draft');

        Route::name('tags.')->prefix('tags')->group(function () {
            Route::get('create/{id}', [ArticleTagsController::class, 'create'])->name('create');
            Route::post('store/{id}', [ArticleTagsController::class, 'store'])->name('store');
            Route::get('edit/{tagId}', [ArticleTagsController::class, 'edit'])->name('edit');
            route::post('update/{tagId}',[ArticleTagsController::class, 'update'])->name('update');
            Route::get('delete/{tagId}', [ArticleTagsController::class, 'delete'])->name('delete');
        });
    });
});

Route::get('clear/tmp', [DashboardController::class, 'clearTmp'])->name('clear.tmp');
