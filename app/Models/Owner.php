<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('owner', function (Builder $builder) {
            $builder->where('role', 'owner');
        });
    }
}
