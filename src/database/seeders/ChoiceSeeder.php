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
        // 1. 一次、二次および三次予防に関する記述である。\n最も適当なのはどれか。1つ選べ。
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

        // 44. 野菜類の成分に関する記述である。最も適当なのはどれか。1つ選べ。
        DB::table('choices')->insert([
            'quiz_id' => 2,
            'content' => '(1) ほうれんそうのシュウ酸は、腸管でのカルシウムの吸収を促進する。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 2,
            'content' => '(2) にんじんの β─カロテンは、光照射によって色調が変化する。',
            'answer' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 2,
            'content' => '(3) なすのナスニンは、金属イオンに対するキレート作用で退色する。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 2,
            'content' => '(4) だいこんのイソチオシアネート類は、リポキシゲナーゼの作用で生成する。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 2,
            'content' => '(5) きゅうりのノナジエナールは、ミロシナーゼの作用で生成する。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 50. 食品成分とその分析方法の組合せである。最も適当なのはどれか。1つ選べ。
        DB::table('choices')->insert([
            'quiz_id' => 3,
            'content' => '(1) たんぱく質 ------ ケルダール法',
            'answer' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 3,
            'content' => '(2) 脂質 ------ プロスキー法',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 3,
            'content' => '(3) 脂肪酸 ------ カールフィッシャー法',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 3,
            'content' => '(4) 炭水化物 ------ 原子吸光光度法',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 3,
            'content' => '(5) ナトリウム ------ ガスクロマトグラフ法',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 58. 栄養機能食品として表示が認められている栄養成分と栄養機能表示の組合せである。\n誤っているのはどれか。1つ選べ。
        DB::table('choices')->insert([
            'quiz_id' => 4,
            'content' => '(1) カリウム ------ 「正常な血圧を保つのに必要な栄養素です」',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 4,
            'content' => '(2) 鉄 ------ 「赤血球を作るのに必要な栄養素です」',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 4,
            'content' => '(3) ビタミン B1 ------ 「炭水化物からのエネルギー産生と皮膚や粘膜の健康維持を助ける栄養素です」',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 4,
            'content' => '(4) ビタミン D ------ 「骨粗鬆症になるリスクの低減を助ける栄養素です」',
            'answer' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 4,
            'content' => '(5) ビタミン K ------ 「正常な血液凝固能を維持する栄養素です」',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 95. 身体活動時における骨格筋のエネルギー供給に関する記述である。\n最も適当なのはどれか。1つ選べ。
        DB::table('choices')->insert([
            'quiz_id' => 5,
            'content' => '(1) クレアチンリン酸の分解によるエネルギー供給は、酸素を必要とする。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 5,
            'content' => '(2) 筋グリコーゲンは、グルコースに変換されて、血中に放出される。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 5,
            'content' => '(3) 高強度（最大酸素摂取量の 85％ 以上）の運動では、糖質が主なエネルギー供給源になる。',
            'answer' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 5,
            'content' => '(4) 脂質のみが燃焼した時の呼吸商は、1.0である。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('choices')->insert([
            'quiz_id' => 5,
            'content' => '(5) 無酸素運動では、筋肉中の乳酸が減少する。',
            'answer' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
