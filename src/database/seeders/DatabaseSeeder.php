<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            QuizYearSeeder::class,
            QuizCategorySeeder::class,
            QuizSeeder::class,
            ChoiceSeeder::class,
            CountSeeder::class,
            ExplanationSeeder::class,
            NoteSeeder::class,
            ResultSeeder::class,
            TimeTrackingSeeder::class,
            SettingSeeder::class
        ]);
    }
}
