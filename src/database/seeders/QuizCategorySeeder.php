<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_categories')->insert([
            'name' => '社会・環境と健康',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '人体の構造と機能及び疾病の成り立ち',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '食べ物と健康',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '基礎栄養学',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '応用栄養学',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '栄養教育論',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '臨床栄養学',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '公衆栄養学',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '給食経営管理論',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('quiz_categories')->insert([
            'name' => '応用力試験',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
