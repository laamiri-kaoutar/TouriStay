<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TouristeController extends Controller
{
    public function index(){

        return view('home', []);
    
    }
}
