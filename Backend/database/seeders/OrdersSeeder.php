<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'total_price' => 30.00,
            ],
            [
                'customer_id' => 1,
                'total_price' => 20.00,
            ],
            [
                'customer_id' => 2,
                'total_price' => 50.00,
            ],
            [
                'customer_id' => 3,
                'total_price' => 10.00,
            ],
        ]);
    }
}
