<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Annonce;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favorite>
 */
class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role_id', 1)->inRandomOrder()->value('id') ?? User::factory()->touriste()->create()->id,
            'annonce_id' => Annonce::All()->inRandomOrder()->value('id') ?? Annonce::factory()->create()->id,
            //
        ];
    }
}
