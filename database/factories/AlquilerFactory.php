<?php

namespace Database\Factories;

use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Coche;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlquilerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alquiler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'f_alquiler'     => $this->faker->dateTimeBetween('-5 year', 'now'),
            'precio'         => $this->faker->numberBetween( $min = 100 , $max = 1000 ),
            'id_coche'       => Coche::all()->random()->id,
            'id_cliente'     => Cliente::all()->random()->id,
        ];
    }
}
