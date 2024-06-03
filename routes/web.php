<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('frontend.index');
});

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
