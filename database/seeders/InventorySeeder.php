<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        /* Farmacia 2: San Lorenzo*/  
        Inventory::create([
            'id' => 1,
            'product_id' =>1,
            'branch_id' =>2,
            'stock' =>10,
            'lot' =>89063250,
            'price' => 15,
            'sale_price' => 15.45,
            'exp_date' => '2022-09-07',           
        ]);
        Inventory::create([
            'id' => 2,
            'product_id' =>1,
            'branch_id' =>2,
            'stock' =>30,
            'lot' =>89063250,
            'price' => 15,
            'sale_price' => 15.45,
            'exp_date' => '2023-09-07',           
        ]);
        Inventory::create([
            'id' => 3,
            'product_id' =>2,
            'branch_id' =>2,
            'stock' =>5,
            'lot' =>63258900,
            'price' => 14.36,
            'sale_price' => 14.79,
            'exp_date' => '2023-04-10',           
        ]);
        Inventory::create([
            'id' => 4,
            'product_id' =>3,
            'branch_id' =>2,
            'stock' =>8,
            'lot' =>3456894567,
            'price' => 10.14,
            'sale_price' => 10.44,
            'exp_date' => '2022-10-01',           
        ]);
        Inventory::create([
            'id' => 5,
            'product_id' =>4,
            'branch_id' =>2,
            'stock' =>2,
            'lot' =>9456734568,
            'price' => 15,
            'sale_price' => 15.045,
            'exp_date' => '2022-07-01',           
        ]);
        Inventory::create([
            'id' => 6,
            'product_id' =>5,
            'branch_id' =>2,
            'stock' =>10,
            'lot' =>3945645687,
            'price' => 0.83,
            'sale_price' => 0.85,
            'exp_date' => '2023-01-01',           
        ]);
        Inventory::create([
            'id' => 7,
            'product_id' =>6,
            'branch_id' =>2,
            'stock' =>2,
            'lot' =>6894567345,
            'price' => 0.24,
            'sale_price' => 0.5,
            'exp_date' => '2022-10-01',           
        ]);
        Inventory::create([
            'id' => 8,
            'product_id' =>6,
            'branch_id' =>2,
            'stock' =>8,
            'lot' =>9456345687,
            'price' => 0.24,
            'sale_price' => 0.5,
            'exp_date' => '2023-01-05',           
        ]);
        Inventory::create([
            'id' => 9,
            'product_id' =>7,
            'branch_id' =>2,
            'stock' =>15,
            'lot' =>7456563894,
            'price' => 0.97,
            'sale_price' => 1.0,
            'exp_date' => '2022-10-01',           
        ]);
        Inventory::create([
            'id' => 10,
            'product_id' =>8,
            'branch_id' =>2,
            'stock' =>4,
            'lot' =>4563456897,
            'price' => 27.11,
            'sale_price' => 27.92,
            'exp_date' => '2022-11-09',           
        ]);
        Inventory::create([
            'id' => 11,
            'product_id' =>8,
            'branch_id' =>2,
            'stock' =>2,
            'lot' =>8945634567,
            'price' => 27.11,
            'sale_price' => 27.92,
            'exp_date' => '2022-07-09',           
        ]);
        Inventory::create([
            'id' => 12,
            'product_id' =>9,
            'branch_id' =>2,
            'stock' =>30,
            'lot' =>989004328,
            'price' => 54.63,
            'sale_price' => 56.2689,
            'exp_date' => '2022-08-05',           
        ]);
        Inventory::create([
            'id' => 13,
            'product_id' =>10,
            'branch_id' =>2,
            'stock' =>5,
            'lot' =>900439288,
            'price' => 12.11,
            'sale_price' => 12.47,
            'exp_date' => '2022-07-09',           
        ]);
        Inventory::create([
            'id' => 14,
            'product_id' =>10,
            'branch_id' =>2,
            'stock' =>8,
            'lot' =>909280438,
            'price' => 12.11,
            'sale_price' => 12.47,
            'exp_date' => '2022-07-21',           
        ]);
        Inventory::create([
            'id' => 15,
            'product_id' =>11,
            'branch_id' =>2,
            'stock' =>20,
            'lot' =>56703450,
            'price' => 1.98,
            'sale_price' => 2.03,
            'exp_date' => '2022-12-21',           
        ]);
        Inventory::create([
            'id' => 16,
            'product_id' =>12,
            'branch_id' =>2,
            'stock' =>10,
            'lot' =>23456709,
            'price' => 25.65,
            'sale_price' => 26.42,
            'exp_date' => '2022-09-17',           
        ]);
        Inventory::create([
            'id' => 17,
            'product_id' =>13,
            'branch_id' =>2,
            'stock' =>2,
            'lot' =>35678378,
            'price' => 13.75,
            'sale_price' => 14.16,
            'exp_date' => '2022-08-24',           
        ]);
        Inventory::create([
            'id' => 18,
            'product_id' =>14,
            'branch_id' =>2,
            'stock' =>5,
            'lot' =>35678929,
            'price' => 11.84,
            'sale_price' => 12.19,
            'exp_date' => '2022-08-15',           
        ]);
        Inventory::create([
            'id' => 19,
            'product_id' =>15,
            'branch_id' =>2,
            'stock' =>50,
            'lot' =>98753764,
            'price' => 0.48,
            'sale_price' => 0.5,
            'exp_date' => '2023-02-17',           
        ]);
        Inventory::create([
            'id' => 20,
            'product_id' =>16,
            'branch_id' =>2,
            'stock' =>50,
            'lot' =>67899023,
            'price' => 1.50,
            'sale_price' => 2,
            'exp_date' => '2023-06-07',           
        ]);
        /* Farmacia 4:  */
        Inventory::create([
            'id' => 21,
            'product_id' =>21,
            'branch_id' =>4,
            'stock' =>50,
            'lot' =>678223455,
            'price' => 0.47,
            'sale_price' => 0.50,
            'exp_date' => '2023-01-07',           
        ]);
        Inventory::create([
            'id' => 22,
            'product_id' =>22,
            'branch_id' =>4,
            'stock' =>30,
            'lot' =>34567788,
            'price' => 0.38,
            'sale_price' => 0.50,
            'exp_date' => '2022-07-07',           
        ]);
        Inventory::create([
            'id' => 23,
            'product_id' =>22,
            'branch_id' =>4,
            'stock' =>10,
            'lot' =>56734788,
            'price' => 0.38,
            'sale_price' => 0.50,
            'exp_date' => '2022-07-07',           
        ]);
        Inventory::create([
            'id' => 24,
            'product_id' =>23,
            'branch_id' =>4,
            'stock' =>20,
            'lot' =>23456779,
            'price' => 3.24,
            'sale_price' => 3.34,
            'exp_date' => '2023-06-07',           
        ]);
        Inventory::create([
            'id' => 25,
            'product_id' =>24,
            'branch_id' =>4,
            'stock' =>25,
            'lot' =>4667899,
            'price' => 1.25,
            'sale_price' => 1.29,
            'exp_date' => '2022-07-02',           
        ]);
        Inventory::create([
            'id' => 26,
            'product_id' =>24,
            'branch_id' =>4,
            'stock' =>2,
            'lot' =>3567890,
            'price' => 1.25,
            'sale_price' => 1.29,
            'exp_date' => '2022-09-02',           
        ]);
        Inventory::create([
            'id' => 27,
            'product_id' =>25,
            'branch_id' =>4,
            'stock' =>12,
            'lot' =>2345678,
            'price' => 15,
            'sale_price' => 15.45,
            'exp_date' => '2022-08-07',           
        ]);
        Inventory::create([
            'id' => 28,
            'product_id' =>26,
            'branch_id' =>4,
            'stock' =>30,
            'lot' =>3456778,
            'price' => 14.36,
            'sale_price' => 14.79,
            'exp_date' => '2022-07-10',           
        ]);
        Inventory::create([
            'id' => 29,
            'product_id' =>27,
            'branch_id' =>4,
            'stock' =>14,
            'lot' =>6788999,
            'price' => 10.14,
            'sale_price' => 10.44,
            'exp_date' => '2023-10-01',           
        ]);
        Inventory::create([
            'id' => 30,
            'product_id' =>28,
            'branch_id' =>4,
            'stock' =>18,
            'lot' =>2345677,
            'price' => 15,
            'sale_price' => 15.045,
            'exp_date' => '2022-09-01',           
        ]);
        Inventory::create([
            'id' => 31,
            'product_id' =>29,
            'branch_id' =>4,
            'stock' =>32,
            'lot' =>86544222,
            'price' => 0.83,
            'sale_price' => 0.85,
            'exp_date' => '2023-05-01',           
        ]);
        
    }
}
