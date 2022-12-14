<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tickets>
 */
class TicketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $estatus = [
            'abierto',
            'cerrado'
        ];
        return [
            'usuario' => $this->faker->userName(),
            'estatus' => $estatus[random_int(0,1)]
        ];
    }
}
