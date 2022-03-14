<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(LaboratorySeeder::class);
        $this->call(PresentationSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
