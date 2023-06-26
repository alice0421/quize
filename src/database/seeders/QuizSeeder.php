<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->insert([
            'quiz_year_id' => 1,
            'quiz_category_id' => 1,
            'content' => 
            "一次、二次および三次予防に関する記述である。\n最も適当なのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
