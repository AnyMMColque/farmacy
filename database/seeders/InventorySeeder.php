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
        Inventory::create([
            'id' => 1,
            'product_id' =>10,
            'branch_id' =>2,
            'stock' =>8,
            'lot' =>32589006,
            'price' => 12.11,
            'sale_price' => 12.4733,
            'exp_date' => '2022-06-07',
            'status' => 0,            
        ]);
    }
}
