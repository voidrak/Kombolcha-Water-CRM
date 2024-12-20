<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
            'woreda' => 'Kombolcha',
            'kebele' => $this->faker->numberBetween(1, 8),
            'house_number' => $this->faker->numberBetween(1000, 9999)
        ];
    }
}
