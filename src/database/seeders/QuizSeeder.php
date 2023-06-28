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
            'quiz_year_id' => 2,
            'quiz_category_id' => 1,
            'content' => 
            "1. 一次、二次および三次予防に関する記述である。\n最も適当なのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('quizzes')->insert([
            'quiz_year_id' => 2,
            'quiz_category_id' => 4,
            'content' => 
            "44. 野菜類の成分に関する記述である。最も適当なのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('quizzes')->insert([
            'quiz_year_id' => 2,
            'quiz_category_id' => 4,
            'content' => 
            "50. 食品成分とその分析方法の組合せである。最も適当なのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('quizzes')->insert([
            'quiz_year_id' => 2,
            'quiz_category_id' => 8,
            'content' => 
            "58. 栄養機能食品として表示が認められている栄養成分と栄養機能表示の組合せである。\n誤っているのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('quizzes')->insert([
            'quiz_year_id' => 2,
            'quiz_category_id' => 2,
            'content' => 
            "95. 身体活動時における骨格筋のエネルギー供給に関する記述である。\n最も適当なのはどれか。1つ選べ。",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
