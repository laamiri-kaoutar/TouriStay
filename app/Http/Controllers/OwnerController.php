<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;


class OwnerController extends Controller
{
   public function index(){
      $user = Owner::with('annonces')->find(auth()->id());
      $count=0;
      foreach ($user->annonces as $annonce) {
         var_dump($annonce->title);
        
      }

      // dd($count);
      


    return view('proprietorDashboard', [
      'user' => $user
    ]);

   }
}
