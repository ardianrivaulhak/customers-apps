<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'contact' => '555-555-5555',
                'balance' => 100.00,
            ],
            [
                'name' => 'Jane Doe',
                'contact' => '555-555-5556',
                'balance' => 50.00,
            ],
            [
                'name' => 'Bob Smith',
                'contact' => '555-555-5557',
                'balance' => 200.00,
            ],
        ]);
    }
}
