<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert([
            'quiz_id' => 1,
            'content' => '(1) 住民を対象とするがん検診は、一次予防である。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 1,
            'content' => '(2) ヒトパピローマウイルス（HPV）ワクチン接種は、二次予防である。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 1,
            'content' => '(3) 脳伷塞発症後の機能回復訓練は、二次予防である。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 1,
            'content' => '(4) 職場におけるストレスチェックは、三次予防である。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 1,
            'content' => '(5) 精神障害者に対する社会復帰支援は、三次予防である。',
            'answer' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
