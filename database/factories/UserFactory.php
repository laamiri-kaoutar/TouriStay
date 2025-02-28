<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'image'=> $this->faker->imageUrl(640, 480, 'food', true),
            'role_id' => $this->faker->unique()->randomElement(['1','2', '3']),
            'remember_token' => Str::random(10),
        ];
    }

    public function owner()
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => 2, // Set role_id to 2 for owner
        ]);
    }

    public function touriste()
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => 1, // Set role_id to 2 for owner
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
