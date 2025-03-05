<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Annonce;



class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    protected $guarded= [];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function annonce(){
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }


}
