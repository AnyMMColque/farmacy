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
    {   
        Product::create([
            'id' => 1,
            'laboratory_id' =>1,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Azitromicina',
            'g_name' =>'AZITROMICINA (ANHIDRA) USP',
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
            'qty_sold' => 2,            
        ]);
        Product::create([
            'id' => 6,
            'laboratory_id' =>12,
            'presentation_id' =>1,
            'branch_id' =>2,
            'user_id' =>2,
            'name' => 'Diclofenaco Sodico 50mg',
            'g_name' =>'DICLOFENACO SODICO',
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
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
            'stock' => 0,
            'qty_sold' => 2,            
        ]);
        /* Product::factory(20)->create(); */
    } 
}
