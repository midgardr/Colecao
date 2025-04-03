<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Figura>
 */
class FiguraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => rand(1, 50),
            'prateleira_id' => rand(1, 50),
            'nome' => fake()->name(),
            'lancamento' => fake()->date(),
            'recebimento' => fake()->date(),
            'observacoes' => fake()->text(),
            'foto' => fake()->imageUrl(),
        ];
    }
}
