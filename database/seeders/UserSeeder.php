<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'prueba',
            'ci' => '123',
            'address' => '123',
            'telephone' => '123',
            'email' => 'admin',
            'user' => 'pr',
            'password' => Hash::make('123456'),
        ]);
    }
}
