<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TouristeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;






use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsTouriste;
use App\Http\Middleware\IsOwner;
use App\Http\Middleware\IsAdminOrOwner;

use App\Models\Owner;
use App\Models\Role;


use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;


// use App\Http\Middleware\Is  Admin;



Route::get('/', function () {
    auth()->logout();   
    // dd(Owner::all());
    // auth()->user()->role->name
    // dd(auth()->user()->role->name);
    // Mail::to('kaoutarlaamiri355@gmail.com')->send(new PaymentConfirmation(5000, 3, '2025-03-01', '2025-03-04'));
    
    return redirect('/register');
    
})->name('home');





Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->middleware([IsAdmin::class])->name('admin.dashboard');
    Route::get('/dashboard/reservations', [ReservationController::class, 'dashboard'])->middleware([IsAdmin::class])->name('dashboard.reservation');
    Route::get('/owner', [OwnerController::class, 'index'])->middleware([IsOwner::class])->name('owner.dashboard');
    Route::get('/touriste', [TouristeController::class, 'index'])->middleware([IsTouriste::class])->name('touriste.dashboard');
    Route::post('/annonce/store', [AnnonceController::class, 'store'])->middleware([IsOwner::class])->name("annonce.store");
    Route::put('/annonce/{id}', [AnnonceController::class, 'update'])->middleware([IsOwner::class])->name("annonce.update");
    Route::get('/annonce/{id}/edit', [AnnonceController::class, 'show'])->middleware([IsOwner::class])->name("annonce.show");
    Route::delete('/annonce/{id}', [AnnonceController::class, 'destroy'])->middleware([IsAdminOrOwner::class])->name("annonce.delete");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/annonces', [AnnonceController::class, 'index'])->middleware([IsAdmin::class])->name("annonces");


    Route::get('/favorites', [FavoriteController::class, 'index'])->middleware([IsTouriste::class])->name('favorites');
    Route::post('/favorite/toggle', [FavoriteController::class, 'toggle'])->middleware([IsTouriste::class])->name('favorite.toggle');
    Route::post('/reservation/complete', [ReservationController::class, 'completeReservation'])->middleware([IsTouriste::class])->name("reservation.complete");

    Route::get('/tourist/reservations', [TouristeController::class, 'reservations'])->name('tourist.reservations');
    Route::get('/owner/reservations' , [OwnerController::class , 'reservations'])->middleware([IsOwner::class])->name('owner.reservations');



    Route::get('/annonce/{id}/available-dates', [ReservationController::class, 'getAvailableDates']);

    Route::post('/pay' ,[PaymentController::class , 'store'])->middleware([IsTouriste::class])->name("reservation.payement");

    Route::get('/notifications/markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('notifications.read');
    




});


Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
