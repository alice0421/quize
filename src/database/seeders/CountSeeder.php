<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counts')->insert([
            'quiz_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
