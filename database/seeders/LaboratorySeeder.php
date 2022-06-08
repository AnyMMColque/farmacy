<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laboratory::create([
            'id' => 1,
            'name' => 'LAFAR S.A',
            'description' => 'LABORATORIOS FARMACEUTICOS LAFAR S.A.',            
        ]);
        Laboratory::create([
            'id' => 2,
            'name' => 'QUIMFA S.A.',
            'description' => 'QUIMFA BOLIVIA S.A',            
        ]);
        Laboratory::create([
            'id' => 3,
            'name' => 'ZAMBON S.P.A',
            'description' => 'ABENDROTH INTERN- DE SERV AUT FARM-AISAFARMA',            
        ]);
        Laboratory::create([
            'id' => 4,
            'name' => 'INTI S.A.',
            'description' => 'DROGUERIA INTI S.A.',            
        ]);
        Laboratory::create([
            'id' => 5,
            'name' => 'ARBOFARMA S.A.',
            'description' => 'ABENDROTH INTERN- DE SERV AUT FARM-AISAFARM',            
        ]);
        Laboratory::create([
            'id' => 6,
            'name' => 'COFAR S.A.',
            'description' => 'LABORATORIOS DE COSMETICA Y FARMOQUIMICA S.A. "COFAR S.A."',            
        ]);
        Laboratory::create([
            'id' => 7,
            'name' => 'ALTEA FARMACEUTICA S.A.',
            'description' => 'DROGUERIA INTI S.A',            
        ]);
        Laboratory::create([
            'id' => 8,
            'name' => 'VITA S.A.',
            'description' => 'LABORATORIOS VITA SA',            
        ]);
        Laboratory::create([
            'id' => 9,
            'name' => 'BAYER S.A',
            'description' => 'BAYER BOLIVIANA LTDA',            
        ]);
        Laboratory::create([
            'id' => 10,
            'name' => 'CRESPAL S.A',
            'description' => 'LABORATORIOS CRESPAL S.A',            
        ]);
        Laboratory::create([
            'id' => 11,
            'name' => 'Solquifar S.R.L',
            'description' => 'SOLUCIONES QUIMICAS Y FARMACEUTICAS-SOLQUIFAR S.R.L',            
        ]);
        Laboratory::create([
            'id' => 12,
            'name' => 'MINERVA S.R.L.',
            'description' => 'LAB. QUIMICO FARMACEUTICOS MINERVA S.R.L.',            
        ]);
        Laboratory::create([
            'id' => 13,
            'name' => 'INDUSTRIA QUIMICA BOLIVIANA INQUIBOL S.R.L',
            'description' => 'INDUSTRIA QUIMICA BOLIVIANA INQUIBOL S.R.L',            
        ]);
        Laboratory::create([
            'id' => 14,
            'name' => 'BAGO S.A.',
            'description' => 'LABORATORIOS BAGO DE BOLIVIA S.A.',            
        ]);
        Laboratory::create([
            'id' => 15,
            'name' => 'TERBOL S.A',
            'description' => 'TERBOL S.A.(LAB.TERAPEUTICA BOLIVIANA SA)',            
        ]);
        Laboratory::create([
            'id' => 16,
            'name' => 'IFARBO LTDA.',
            'description' => 'IFARBO LTDA.',            
        ]);
        Laboratory::create([
            'id' => 17,
            'name' => 'SIGMA CORP. SRL',
            'description' => 'ND. QUIMICA FARMACEUTICA SIGMA CORP. SRL',            
        ]);
        Laboratory::create([
            'id' => 18,
            'name' => 'HAHNEMANN S.R.L.',
            'description' => 'LABORATORIOS HAHNEMANN S.R.L.',            
        ]);
        Laboratory::create([
            'id' => 19,
            'name' => 'IFA S.A.',
            'description' => 'LABORATORIOS IFA S.A.',            
        ]);
        Laboratory::create([
            'id' => 20,
            'name' => 'FEBSA SRL',
            'description' => 'LABORATORIOS FEBSA SRL',            
        ]);
        /* Laboratory::factory(20)->create(); */
    }
}