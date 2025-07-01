<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::route('login');
});


Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        abort(403, 'غير مصرح لك بالدخول هنا.');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ✅ مجموعة Routes للمشرف
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('events', EventController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/events/{event}/registrations', [EventController::class, 'showRegistrations'])
        ->name('events.registrations');
});
