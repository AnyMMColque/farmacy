<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_p' => $this->faker->sentence(2),
            'register' => '264890',
            'name' => $this->faker->sentence(2),
            'address' => $this->faker->address,
            'telephone' => '231353',
            'turn' => 'no',
            'nit' => '1352352',
            'authorization' => '143545',
            'lat' => '-19.58899',
            'lng' => '-65.75406',
        ];
    }
}
