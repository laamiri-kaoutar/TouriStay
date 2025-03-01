<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Annonce;



class Favorite extends Model
{
    /** @use HasFactory<\Database\Factories\FavoriteFactory> */
    use HasFactory;

    protected $guarded = [];


    public function touriste(){
        return $this->belongsTo(User::class, 'user_id'); 
    }

    
    public function annonce(){
        return $this->belongsTo(Annonce::class, 'user_id'); 
    }
}
