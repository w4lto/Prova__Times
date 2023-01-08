<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['I', 'B']);
        $nome = $type == 'I' ? $this->faker->name() : $this->faker->company();


        return [
            'nome'=> $nome,
            'telefone'=>$this->faker->bothify('###########'),
            'cpf'=>$this->faker->unique()->bothify('###########'),
            'placa_do_carro'=>$this->faker->unique()->bothify('???#?##'),
            'marca'=>$this->faker->bothify('?????'),
            'cor'=>$this->faker->safeColorName(),
        ];
    }
}
