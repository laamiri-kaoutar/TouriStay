<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Owner;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonces>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(3), 
            'price' => $this->faker->randomFloat(2, 100, 5000), 
            'location' => $this->faker->city,
            'image'=> $this->faker->imageUrl(640, 480, 'food', true),
            'available_from' => $this->faker->dateTimeBetween('now', '+1 month'), 
            'available_to' => $this->faker->dateTimeBetween('+2 months', '+6 months'), 
            'rooms' => $this->faker->numberBetween(1, 5), 
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'user_id' => User::where('role_id', 2)->inRandomOrder()->value('id') ?? User::factory()->owner()->create()->id,
            'type' => Arr::random(['appartement', 'house', 'villa', 'studio']),      
        ];
    }

    
}
