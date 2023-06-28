<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_years')->insert([
            'name' => '第36回',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('quiz_years')->insert([
            'name' => '第37回',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
