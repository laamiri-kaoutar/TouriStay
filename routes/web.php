<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TouristeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnonceController;



use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsTouriste;
use App\Http\Middleware\IsOwner;
use App\Models\Owner;
use App\Models\Role;



// use App\Http\Middleware\Is  Admin;



Route::get('/', function () {
    // auth()->logout(); 
    // dd(Owner::all());
    // auth()->user()->role->name
    // dd(auth()->user()->role->name);
    // return view('welcome');
    // return view('editAnnonce');

    return view('auth/register' , [ 'roles' => Role::all()]);


})->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin', function () {
//         return view('dashboardTest');
//     })->middleware([IsAdmin::class]);

//     Route::get('/touriste', function () {
//         return view('home');
//     })->middleware([IsTouriste::class]);

//        Route::get('/owner', [OwnerController::class, 'index'])->middleware([IsOwner::class])->name('owner.dashboard');

  
// });





Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->middleware([IsAdmin::class])->name('admin.dashboard');
    Route::get('/owner', [OwnerController::class, 'index'])->middleware([IsOwner::class])->name('owner.dashboard');
    Route::get('/touriste', [TouristeController::class, 'index'])->middleware([IsTouriste::class])->name('touriste.dashboard');
    Route::post('/annonce/store', [AnnonceController::class, 'store'])->middleware([IsOwner::class])->name("annonce.store");
    Route::put('/annonce/{id}', [AnnonceController::class, 'update'])->middleware([IsOwner::class])->name("annonce.update");
    Route::get('/annonce/{id}/edit', [AnnonceController::class, 'show'])->middleware([IsOwner::class])->name("annonce.show");
    Route::delete('/annonce/{id}', [AnnonceController::class, 'destroy'])->middleware([IsOwner::class])->name("annonce.delete");

    Route::get('/favorites', [FavoriteController::class, 'index'])->middleware([IsTouriste::class])->name('favorites');





});


Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
