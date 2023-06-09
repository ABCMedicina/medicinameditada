<?php

namespace Database\Factories;

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
    public function definition()
    {
        $nombres= fake()->firstName();
        $apellidos= fake()->lastName();

        return [
            'name' => $nombres.' '.$apellidos,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'documento' => fake()->unique()->randomNumber(8),
            'fecha_nacimiento' => fake()->date(),
            'telefono' => fake()->unique()->randomNumber(8),
            'direccion' => fake()->address(),
            'email' => Str::slug($nombres.''.$apellidos).'@mailinator.com',
            //'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'estado' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
