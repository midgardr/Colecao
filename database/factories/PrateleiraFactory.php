<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prateleira>
 */
class PrateleiraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colecao_id' => rand(1, 10),
            'nome' => fake()->name(),
            'descricao' => fake()->text(),
        ];
    }
}
