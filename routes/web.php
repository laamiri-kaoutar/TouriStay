<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TouristeController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsTouriste;
use App\Http\Middleware\IsOwner;

// use App\Http\Middleware\Is  Admin;



Route::get('/', function () {
    auth()->logout(); 
    // auth()->user()->role->name
    // dd(auth()->user()->role->name);
    // return view('welcome');
    return view('auth/register');


});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin', function () {
//         return view('dashboardTest');
//     })->middleware([IsAdmin::class]);

//     Route::get('/touriste', function () {
//         return view('home');
//     })->middleware([IsTouriste::class]);

//        Route::get('/owner', [OwnerController::class, 'index'])->middleware([IsOwner::class])->name('owner.dashboard');

  
// });





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware([IsAdmin::class])->name('admin.dashboard');
    Route::get('/owner', [OwnerController::class, 'index'])->middleware([IsOwner::class])->name('owner.dashboard');
    Route::get('/touriste', [TouristeController::class, 'index'])->middleware([IsTouriste::class])->name('touriste.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
