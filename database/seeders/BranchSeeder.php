<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'id' => 1,
            'name_p' => 'Raul Lopez',
            'register' => 13456029,
            'name' => 'Caroline',            
            'address' => 'Arce # 53',
            'telephone' => 6223456,
            'lat' => -19.581431,
            'lng' =>  -65.756382,
            'turn' => 'si',
            'open' => 'si',
            'nit' => 4589256793,
            'authorization' => 309468267289402,
            'qty_sold' => 0,
        ]);
        Branch::create([
            'id' => 2,
            'name_p' => 'Raul Lopez',
            'register' => 10293456,
            'name' => 'San Lorenzo',            
            'address' => 'Calle Hernandez # 1003 ',
            'telephone' => 6228976,
            'lat' => -19.596115,
            'lng' => -65.747096,
            'turn' => 'si',
            'open' => 'si',
            'nit' => 2567934589,
            'authorization' => 289309468267402,
            'qty_sold' => 15,
        ]);
        Branch::create([
            'id' => 3,
            'name_p' => 'Alfredo Quintanilla',
            'register' => 34780927,
            'name' => 'Alfredo',            
            'address' => 'Calle Diego de Almagro # 817 ',
            'telephone' => 6234568,
            'lat' => -19.588516,
            'lng' => -65.746878,
            'turn' => 'no',
            'open' => 'si',
            'nit' => 2395645879,
            'authorization' => 946822896743002,
            'qty_sold' => 2,
        ]);
        Branch::create([
            'id' => 4,
            'name_p' => 'Antonio Quijarro',
            'register' => 92734780,
            'name' => 'Sagrado Corazón de Jesús',            
            'address' => 'Cochabamba # 17 ',
            'telephone' => 6256834,
            'lat' => -19.588637,
            'lng' => -65.756239,
            'turn' => 'no',
            'open' => 'no',
            'nit' => 9956423758,
            'authorization' => 924682430028967,
            'qty_sold' => 8,
        ]);
        Branch::create([
            'id' => 5,
            'name_p' => 'Jose Camargo',
            'register' => 78270934,
            'name' => 'Florencia Jesús',            
            'address' => 'Chuquisaca # 39 ',
            'telephone' => 6278290,
            'lat' => -19.590188,
            'lng' => -65.744859,
            'turn' => 'no',
            'open' => 'no',
            'nit' => 3758599264,
            'authorization' => 926743002868249,
            'qty_sold' => 5,
        ]);
       /*  Branch::factory(4)->create(); */
    }
}
