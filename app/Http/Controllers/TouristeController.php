<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;


class TouristeController extends Controller
{
    public function index(Request $request){

        $query = Annonce::query();

        if($request->filled('search')){
            $searchKey = $request->search;

            // $query->where(function($q) use ($searchKey){
            //     $q->where('title' , 'like' ,'%' , $searchKey,'%')
            //     ->orwhere('price' , 'like' ,'%' , $searchKey,'%')
            //     ->orwhere('location' , 'like' ,'%' , $searchKey,'%');

            // } );
            $query->where(function($q) use ($searchKey) {
                $q->whereRaw("title ILIKE ?", ['%' . $searchKey . '%'])
                  ->orWhereRaw("CAST(price AS TEXT) ILIKE ?", ['%' . $searchKey . '%'])
                  ->orWhereRaw("location ILIKE ?", ['%' . $searchKey . '%']);
            });
        }

        if ($request->filled('filter')) {
            $query->where('type' , $request->filter);
        }

        $perPage= $request->filled('per_page') ? $request->per_page : 6;

        $annonces= $query->paginate($perPage)->withQueryString();


    

        return view('home', [
            'annonces' =>  $annonces,
        ]);
    
    }

    public function test(Request $request)
{
    // Start with a query builder
    $query = Annonce::query();
    
    // Search text (searches across multiple fields)
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        
        $query->where(function($q) use ($searchTerm) {
            $q->where('title', 'like', '%' . $searchTerm . '%')
              ->orWhere('location', 'like', '%' . $searchTerm . '%')
              ->orWhere('price', 'like', '%' . $searchTerm . '%');
              
        });
    }
    
    // Filter by property type if selected
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }
    
    // Set pagination amount (default to 10 if not specified)
    $perPage = $request->filled('per_page') ? $request->per_page : 10;
    
    // Get results with pagination
    $annonces = $query->paginate($perPage)->withQueryString();
    
    return view('home', [
        'annonces' => $annonces,
    ]);
}


}
