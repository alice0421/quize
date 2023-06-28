<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\Setting;
use App\Models\QuizYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

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

    public function setting_store(Request $request, $type, $id){
        // 設定を保存
        $input_settings = $request['settings'];
        $input_settings['number'] = (int) $input_settings['number'];
        $input_settings['limit_time'] = (int) $input_settings['limit_time'];

        $settings = Setting::find($input_settings['id']);
        $settings->fill($input_settings)->save();

        // 選択した問題解答ページ（年度別 / 分野別）へ遷移するため、axiosにrリダイレクトURLを返信。
        return response()->json([
            'redirect' => route('quiz', ['type' => $type, 'id' => $id])
        ], Response::HTTP_OK); // 選択した問題(年度か分野)のid
    }

    public function quiz($type, $id){
        dd('This is Quiz Page!');
    }
}
