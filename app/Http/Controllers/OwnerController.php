<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Reservation;



class OwnerController extends Controller
{
   public function index(){
      $user = Owner::with('annonces')->find(auth()->id());
      $count=0;
      foreach ($user->annonces as $annonce) {
         var_dump($annonce->title);
        
      }

      // dd($user->annonces);
      


    return view('proprietorDashboard', [
      'user' => $user
    ]);

   }

   public function reservations()
   {
       $reservations = Reservation::whereHas('annonce', function ( $query) {
         $query->where('user_id', auth()->id());
     })->paginate(4);

       return view('ownerReservations', compact('reservations'));
   }
}
