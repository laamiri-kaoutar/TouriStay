<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Touriste;




class TouristeController extends Controller
{
    public function index(Request $request)
    {

        $query = Annonce::query();

        if($request->filled('search')){
            $searchKey = $request->search;
            $query->where(function($q) use ($searchKey) {
                $q->whereRaw("title ILIKE ?", ['%' . $searchKey . '%'])
                  ->orWhereRaw("CAST(price AS TEXT) ILIKE ?", ['%' . $searchKey . '%'])
                  ->orWhereRaw("location ILIKE ?", ['%' . $searchKey . '%']);
            });
        }

        if ($request->filled('filter')) {
            $query->where('type' , $request->filter);
        }

        $perPage= $request->filled('per_page') ? $request->per_page : 4;

        $annonces= $query->paginate($perPage)->withQueryString();

        $favorites = Touriste::with('favorites')->find(auth()->id())->favorites;

        return view('home', [
            'annonces' =>  $annonces,
            'favoriteAnnonces' => $favorites

        ]);
    
    }

  


}
