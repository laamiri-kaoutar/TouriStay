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


    public function store(StoreAnnonceRequest  $request)
    {      
        $validated = $request->validated();


        $validated['user_id'] = auth()->id(); 


        $validated['image'] = $request->file('image')->store('images', 'public');
        // dd($data);
        // $data['type'] = [$data['type'] ];

        Annonce::create($validated);
        return redirect()->back()->with('success', 'recette Updated successfully!');

    } 

    public function show($id){
        return view('editAnnonce' , ['annonce' => Annonce::with('owner')->find($id)]);
    }

    public function update(StoreAnnonceRequest  $request ,$id)
    {      
        // dd($id);
       $data= $request->validated();


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
