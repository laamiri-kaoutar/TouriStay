<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Annonce;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(3)->create();
        User::factory()->create();
        Annonce::factory(10)->create();

    }
}
