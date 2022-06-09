<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   /* Farmacia 2: San Lorenzo */
        Product::create([
            'id' => 1,
            'laboratory_id' =>1,
            'presentation_id' =>2,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Lefren 500',
            'g_name' =>'AZITROMICINA',
            'stock' => 40,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 2,
            'laboratory_id' =>4,
            'presentation_id' =>2,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Batrom',
            'g_name' =>'AZITROMICINA (ANHIDRA) USP',
            'stock' => 5,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 3,
            'laboratory_id' =>8,
            'presentation_id' =>3,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Bicarbonato de Sodio 8% Vita',
            'g_name' =>'BICARBONATO DE SODIO',
            'stock' => 8,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 4,
            'laboratory_id' =>12,
            'presentation_id' =>6,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Cotrimoxazol',
            'g_name' =>'COTRIMOXAZOL(SULFAMETOXAZOL + TRIMETOPRIM)',
            'stock' => 2,
            'qty_sold' => 2,            
        ]);      
        Product::create([
            'id' => 5,
            'laboratory_id' =>6,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Dexacofasona 0,5mg',
            'g_name' =>'DEXAMETASONA',
            'stock' => 10,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 6,
            'laboratory_id' =>18,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Diclofenaco Sodico 50mg',
            'g_name' =>'DICLOFENACO SODICO',
            'stock' => 10,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 7,
            'laboratory_id' =>19,
            'presentation_id' =>6,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Diprofen 100mg',
            'g_name' =>'IBUPROFENO',
            'stock' => 15,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 8,
            'laboratory_id' =>19,
            'presentation_id' =>5,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Multivitaminas',
            'g_name' =>'MULTIVITAMINAS',
            'stock' => 6,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 9,
            'laboratory_id' =>4,
            'presentation_id' =>7,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Ome-Gastrin',
            'g_name' => 'OMEPRAZOL',
            'stock' => 30,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 10,
            'laboratory_id' =>16,
            'presentation_id' =>5,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Acetamol',
            'g_name' => 'PARACETAMOL',
            'stock' => 13,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 11,
            'laboratory_id' =>19,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Prednisona 20mg',
            'g_name' => 'PREDNISONA',
            'stock' => 20,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 12,
            'laboratory_id' =>19,
            'presentation_id' =>6,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Cotrimoxazol 400-80MG/5ML',
            'g_name' => 'SULFAMETOXAZOL- TRIMETOPRIMA',
            'stock' => 10,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 13,
            'laboratory_id' =>12,
            'presentation_id' =>5,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Minerzinc',
            'g_name' => 'SULFATO DE ZINC',
            'stock' => 2,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 14,
            'laboratory_id' =>4,
            'presentation_id' =>3,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => ' Neurobion 5000',
            'g_name' => 'VITAMINA B1; B6; B12',
            'stock' => 5,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 15,
            'laboratory_id' =>21,
            'presentation_id' =>8,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Barbijo Desechable',
            'g_name' => 'BARBIJO DESECHABLE',
            'stock' => 50,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 16,
            'laboratory_id' =>21,
            'presentation_id' =>8,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Guantes Quirurgicos Desechables',
            'g_name' => 'GUANTES QUIRURGICOS DESECHABLES',
            'stock' => 50,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 17,
            'laboratory_id' =>9,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Aspirinetas',
            'g_name' => 'ÁCIDO ACETIL SALICÍLICO',
            'stock' => 0,
            'qty_sold' => 0,            
        ]);
        Product::create([
            'id' => 18,
            'laboratory_id' =>9,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Aspirina',
            'g_name' => 'ACIDO ACETILSALICILICO',
            'stock' => 0,
            'qty_sold' => 0,            
        ]);
        Product::create([
            'id' => 19,
            'laboratory_id' =>9,
            'presentation_id' =>9,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Redoxon 1gr',
            'g_name' => 'ACIDO ASCORBICO',
            'stock' => 0,
            'qty_sold' => 0,            
        ]);
        Product::create([
            'id' => 20,
            'laboratory_id' =>16,
            'presentation_id' =>5,
            'branch_id' =>2,
            'user_id' =>3,
            'name' => 'Vitamin C 1000mg',
            'g_name' => 'ACIDO ASCORBICO',
            'stock' => 0,
            'qty_sold' => 0,            
        ]);
        /* Farmacia 4:  */
        Product::create([
            'id' => 21,
            'laboratory_id' =>9,
            'presentation_id' =>1,
            'branch_id' =>4,
            'user_id' =>5,
            'name' => 'Aspirinetas',
            'g_name' => 'ÁCIDO ACETIL SALICÍLICO',
            'stock' => 50,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 22,
            'laboratory_id' =>9,
            'presentation_id' =>1,
            'branch_id' =>4,
            'user_id' =>4,
            'name' => 'Aspirina',
            'g_name' => 'ACIDO ACETILSALICILICO',
            'stock' => 10,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 23,
            'laboratory_id' =>9,
            'presentation_id' =>9,
            'branch_id' =>4,
            'user_id' =>5,
            'name' => 'Redoxon 1gr',
            'g_name' => 'ACIDO ASCORBICO',
            'stock' => 20,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 24,
            'laboratory_id' =>16,
            'presentation_id' =>5,
            'branch_id' =>4,
            'user_id' =>5,
            'name' => 'Vitamin C 1000mg',
            'g_name' => 'ACIDO ASCORBICO',
            'stock' => 27,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 25,
            'laboratory_id' =>1,
            'presentation_id' =>2,
            'branch_id' =>4,
            'user_id' =>4,
            'name' => 'Lefren 500',
            'g_name' =>'AZITROMICINA',
            'stock' => 12,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 26,
            'laboratory_id' =>4,
            'presentation_id' =>2,
            'branch_id' =>4,
            'user_id' =>5,
            'name' => 'Batrom',
            'g_name' =>'AZITROMICINA (ANHIDRA) USP',
            'stock' => 30,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 27,
            'laboratory_id' =>8,
            'presentation_id' =>3,
            'branch_id' =>4,
            'user_id' =>4,
            'name' => 'Bicarbonato de Sodio 8% Vita',
            'g_name' =>'BICARBONATO DE SODIO',
            'stock' => 14,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 28,
            'laboratory_id' =>12,
            'presentation_id' =>6,
            'branch_id' =>4,
            'user_id' =>4,
            'name' => 'Cotrimoxazol',
            'g_name' =>'COTRIMOXAZOL(SULFAMETOXAZOL + TRIMETOPRIM)',
            'stock' => 18,
            'qty_sold' => 2,            
        ]);      
        Product::create([
            'id' => 29,
            'laboratory_id' =>6,
            'presentation_id' =>1,
            'branch_id' =>4,
            'user_id' =>4,
            'name' => 'Dexacofasona 0,5mg',
            'g_name' =>'DEXAMETASONA',
            'stock' => 32,
            'qty_sold' => 2,            
        ]);
        /* Product::factory(20)->create(); */
    } 
}
