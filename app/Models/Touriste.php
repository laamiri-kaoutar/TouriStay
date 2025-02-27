<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
