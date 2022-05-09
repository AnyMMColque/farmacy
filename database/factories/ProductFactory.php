<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Branch;
use App\Models\Generic;
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
            'g_name' => Generic::all()->random()->gname,
            'stock' => 0,
            'laboratory_id' => Laboratory::all()->random()->id,
            'presentation_id' => Presentation::all()->random()->id,
            'branch_id' => Branch::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
