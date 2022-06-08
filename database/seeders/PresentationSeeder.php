<?php

namespace Database\Seeders;

use App\Models\Presentation;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::create([
            'id' => 1,
            'name' => 'Comprimido',
            'description' => 'CAJA POR 1 BLISTER DE PVC CRISTAL/AL POR 10 COMPRIMIDOS DE 25 BLISTER CADA CAJA.',            
        ]);
        Presentation::create([
            'id' => 2,
            'name' => 'Comprimido Recubierto',
            'description' => 'CAJA DE CARTON IMPRESA X 10 O 100 BLISTERS DE AL-PVC X 10 COMPRIMIDOS',            
        ]);
        Presentation::create([
            'id' => 3,
            'name' => 'Solución Inyectable',
            'description' => 'CAJA X 1 AMPOLLA',            
        ]);
        Presentation::create([
            'id' => 4,
            'name' => 'Unguento',
            'description' => 'POMO PLASTICO',            
        ]);
        Presentation::create([
            'id' => 5,
            'name' => 'Jarabe',
            'description' => 'CAJA CARTULINA COLOR X 1 FRASCO PEAD ',            
        ]);
        Presentation::create([
            'id' => 6,
            'name' => 'Suspensión',
            'description' => 'CJA X 1 FRASCO PET AMBAR X 60 ML',            
        ]);
        Presentation::create([
            'id' => 7,
            'name' => 'Polvo P/ Solución Inyec',
            'description' => 'CAJA CONTENIENDO UN VIAL + DISOLVENTE E INSERTO EXPLICATIVO',            
        ]);
        /* Presentation::factory(20)->create(); */
    }
}
