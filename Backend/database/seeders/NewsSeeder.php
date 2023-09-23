<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'News 1',
                'content' => 'Content for News 1',
            ],
            [
                'title' => 'News 2',
                'content' => 'Content for News 2',
            ],
            [
                'title' => 'News 3',
                'content' => 'Content for News 3',
            ],
        ]);
    }
}
