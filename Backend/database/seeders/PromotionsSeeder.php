<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            [
                'title' => 'Promotion 1',
                'description' => 'Description for Promotion 1',
            ],
            [
                'title' => 'Promotion 2',
                'description' => 'Description for Promotion 2',
            ],
            [
                'title' => 'Promotion 3',
                'description' => 'Description for Promotion 3',
            ],
        ]);
    }
}
