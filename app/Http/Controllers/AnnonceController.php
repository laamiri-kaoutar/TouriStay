<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;

class AnnonceController extends Controller
{

    public function index(){

        $annonces = Annonce::with('owner')->get();

        return view('Announcements' ,['annonces'=> $annonces]);

    }


    public function store(Request  $request)
    {      
       $data= $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:appartement,house,villa,studio',
            'description' => 'nullable|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available_from' => 'nullable|date',
            'available_to' => 'nullable|date|after_or_equal:available_from',
            'rooms' => 'nullable|integer|min:1|max:5',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'bathrooms' => 'nullable|integer|min:1|max:5',
            'location' => 'required|string|max:255',
        ]);

        $data['user_id'] = auth()->id(); 


        $data['image'] = $request->file('image')->store('images', 'public');
        // dd($data);
        // $data['type'] = [$data['type'] ];

        Annonce::create($data);
        return redirect()->back()->with('success', 'recette Updated successfully!');

    } 

    public function show($id){
        return view('editAnnonce' , ['annonce' => Annonce::with('owner')->find($id)]);
    }

    public function update(Request  $request ,$id)
    {      
        // dd($id);
       $data= $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:appartement,house,villa,studio',
            'description' => 'nullable|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available_from' => 'nullable|date',
            'available_to' => 'nullable|date|after_or_equal:available_from',
            'rooms' => 'nullable|integer|min:1|max:5',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'bathrooms' => 'nullable|integer|min:1|max:5',
            'location' => 'required|string|max:255',
        ]);

        // $data['user_id'] = auth()->id(); 
        $annonce = Annonce::findOrFail($id);

       

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        } else {
            $data['image'] = $annonce->image;
        }


        // dd($data['image']);
        

        $annonce->update($data);
        return redirect('/owner');

    } 

    
    public function destroy($id)
    {
        // dd('gg');
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->back()->with('success', 'Temoignage deleted successfully!');

    }

}
