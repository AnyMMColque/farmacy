<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ci' => '1352352',
            'name' => $this->faker->name(),
            'email' => 'correo.electronico@gmail.com',
        ];
    }
}
