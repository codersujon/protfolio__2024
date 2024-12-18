<?php

use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/', function () {
    return view('frontend.index');
});


/**
 * Portfolio Page
 */

Route::middleware('auth')->group(function(){
    Route::controller(PortfolioController::class)->group(function(){
        Route::get('/portfolio/all', 'index')->name('portfolio.index');
        Route::get('/portfolio/add', 'create')->name('portfolio.create');
        Route::post('/portfolio/store', 'store')->name('portfolio.store');
        Route::get('/portfolio/edit/{id}', 'edit')->name('portfolio.edit');
        Route::post('/portfolio/update/{id}', 'update')->name('portfolio.update');
        Route::get('/portfolio/destroy/{id}', 'destroy')->name('portfolio.destroy');
        Route::get('/portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');

    });
});

/**
 * Home Slide
 */
Route::middleware('auth')->group(function(){
    Route::controller(HomeSliderController::class)->group(function(){
        Route::get('/home/slide', 'edit')->name('home.slide');
        Route::post('/slider/update', 'update')->name('slider.update');
    });
});

/**
 * About Page
 */
Route::middleware('auth')->group(function(){
    Route::controller(AboutController::class)->group(function(){
        Route::get('/about/page', 'AboutPage')->name('about.page');
        Route::post('/about/update', 'AboutUpdate')->name('about.update');
        Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
        Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
        Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
        Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
        Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
        Route::get('/destroy/multi/image/{id}', 'DestroyMultiImage')->name('destroy.multi.image');
    });
});

Route::get('/about', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $adminData  = User::find($id);
    return view('backend.index', compact('adminData'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'Profile'])->name('admin.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/change/password', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/update/password', [ProfileController::class, 'updatePassword'])->name('update.password');
});

require __DIR__.'/auth.php';
