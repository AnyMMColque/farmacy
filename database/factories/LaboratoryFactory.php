<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nit' => '1352352',
            'name' => $this->faker->sentence(2),
            'cellphone' => '231353',
        ];
    }
}
