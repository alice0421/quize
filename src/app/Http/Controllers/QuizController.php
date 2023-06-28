<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\Setting;
use App\Models\QuizYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function setting($type, $id)
    {
        if($type === 'year'){
            return Inertia::render('Quizzes/QuizSettingPage', [
                'type' => $type,
                'id' => $id,
                'name' => QuizYear::find((int) $id)->name,
                'total_num' => count(QuizYear::with('quizzes')->find((int) $id)->quizzes()->get()),
                'setting' => Setting::where('user_id', Auth::id())->first()
            ]);
        } else {
            return Inertia::render('Quizzes/QuizSettingPage', [
                'type' => $type,
                'id' => $id,
                'name' => QuizCategory::find((int) $id)->name,
                'total_num' => count(QuizCategory::with('quizzes')->find((int) $id)->quizzes()->get()),
                'setting' => Setting::where('user_id', Auth::id())->first()
            ]);
        }
    }

    public function quiz($type, $id){
        dd($type, $id); // 選択した問題(年度か分野)のid
    }
}
