<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Touriste;


class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id()) 
        ->with('annonce') 
        ->simplePaginate(4); 
    
        return view('favorites', ['favorites' => $favorites]);
    }

    
    public function toggle(Request $request)
    {
        $favorite = Favorite::where('annonce_id', $request->annonce_id)
                            ->where('user_id', auth()->id())
                            ->first();
        
        if ($favorite) {
            $favorite->delete();
            $message = 'Property removed from favorites';
        } else {
            Favorite::create([
                'annonce_id' => $request->annonce_id,
                'user_id' => auth()->id(),
            ]);
            $message = 'Property added to favorites';
        }
    
        return redirect()->back()->with('success', $message);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'annonce_id' => 'required|exists:annonces,id',

        ]); 

        Favorite::create([
            'annonce_id' => $request->annonce_id,
            'user_id' => auth()->id(),

        ]);

        return redirect()->back()->with('success', 'recette Updated successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

    }
}
