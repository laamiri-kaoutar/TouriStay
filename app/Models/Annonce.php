<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservation;



class Annonce extends Model
{
    /** @use HasFactory<\Database\Factories\AnnoncesFactory> */
    use HasFactory;
    protected $guarded= [];
    
    public function owner(){
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function reservations(){
        return $this->hasMany(Reservation::class, 'reservation_id'); 
    }
}
