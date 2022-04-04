<?php

namespace Database\Factories;

use App\Models\Laboratory;
use App\Models\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        
        return [
            'name' => $name, 
            'g_name' => $name.$this->faker->sentence(1),
            'stock' => 20,
            'lot' => 666,
            'exp_date' => '2022-03-09',
            'price' => $this->faker->randomElement([1.99, 4.9, 9.99, 20, 50]),
            'laboratory_id' => Laboratory::all()->random()->id,
            'presentation_id' => Presentation::all()->random()->id
        ];
    }
}
