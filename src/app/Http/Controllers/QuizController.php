<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\QuizYear;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function select(QuizCategory $category, QuizYear $year)
    {
        return Inertia::render('Quizzes/QuizSelectPage', [
            'categories' => $category->get(),
            'years' => $year->get()
        ]);
    }

    public function setting_year(QuizYear $year)
    {
        dd('quiz.year.setting', $year->id);
    }

    public function setting_category(QuizCategory $category)
    {
        dd('quiz.category.setting', $category->id);
    }
}
