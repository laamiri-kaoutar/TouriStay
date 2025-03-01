<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;


class Touriste extends User
{
    protected $table = 'users';

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('touriste', function (Builder $builder) {
    //         $builder->where('role', 'touriste');
    //     });
    // }

    public function favorites(){
        return $this->hasMany(Favorite::class, 'user_id'); 
    }
}
