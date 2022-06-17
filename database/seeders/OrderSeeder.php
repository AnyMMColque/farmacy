<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id' => 1,
            'user_id' =>2,
            'customer_id' =>5,
            'branch_id' =>2,
            'pay' =>50,
            'discount' => 0,
            'total' =>15.00,
            'status' => 0,
            'date' => '2022-02-19',            
        ]);
        Order::create([
            'id' => 2,
            'user_id' =>3,
            'customer_id' =>3,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 2,
            'total' =>75.2,
            'status' => 0,
            'date' => '2022-02-24',            
        ]);
        Order::create([
            'id' => 3,
            'user_id' =>3,
            'customer_id' =>2,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>39.00,
            'status' => 0,
            'date' => '2022-05-10',            
        ]);
        Order::create([
            'id' => 4,
            'user_id' =>3,
            'customer_id' =>10,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>10.50,
            'status' => 1,
            'date' => '2022-05-22',            
        ]);
        Order::create([
            'id' => 5,
            'user_id' =>3,
            'customer_id' =>13,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>5.00,
            'status' => 0,
            'date' => '2022-04-17',            
        ]);
        Order::create([
            'id' => 6,
            'user_id' =>3,
            'customer_id' =>8,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>158.00,
            'status' => 0,
            'date' => '2022-03-21',            
        ]);
        Order::create([
            'id' => 7,
            'user_id' =>3,
            'customer_id' =>8,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>2.00,
            'status' => 0,
            'date' => '2022-01-21',            
        ]);
        Order::create([
            'id' => 8,
            'user_id' =>3,
            'customer_id' =>6,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>23.80,
            'status' => 0,
            'date' => '2022-02-01',            
        ]);
        Order::create([
            'id' => 9,
            'user_id' =>3,
            'customer_id' =>1,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>42.00,
            'status' => 0,
            'date' => '2022-02-10',            
        ]);
        Order::create([
            'id' => 10,
            'user_id' =>3,
            'customer_id' =>7,
            'branch_id' =>2,
            'pay' =>100,
            'discount' => 0,
            'total' =>7.50,
            'status' => 0,
            'date' => '2022-02-26',            
        ]); 

    }
}
