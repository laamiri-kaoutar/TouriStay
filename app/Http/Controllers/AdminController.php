<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;


class AdminController extends Controller
{
    public function index(){

        $totalOwners = User::where('role_id', 1)->count();
        $totalTouristes = User::where('role_id', 3)->count();


        $totalAnnonces = Annonce::count();
       


        return view('dashboardTest', compact('totalAnnonces', 'totalTouristes', 'totalOwners'));
    
    }
}
