<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Setting;
use App\Models\Quiz;
use App\Models\QuizCategory;
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
                'title' => QuizYear::find((int) $id)->name,
                'total_num' => count(QuizYear::with('quizzes')->find((int) $id)->quizzes()->get()),
                'setting' => Setting::where('user_id', Auth::id())->first()
            ]);
        } else {
            return Inertia::render('Quizzes/QuizSettingPage', [
                'type' => $type,
                'id' => $id,
                'title' => QuizCategory::find((int) $id)->name,
                'total_num' => count(QuizCategory::with('quizzes')->find((int) $id)->quizzes()->get()),
                'setting' => Setting::where('user_id', Auth::id())->first()
            ]);
        }
    }

    public function setting_store(Request $request, $type, $id){
        // 設定を保存
        $input_settings = $request['setting'];
        $input_settings['number'] = (int) $input_settings['number'];
        $input_settings['limit_time'] = (int) $input_settings['limit_time'];

        $settings = Setting::find($input_settings['id']);
        $settings->fill($input_settings)->save();

        // 選択した問題解答ページ（年度別 / 分野別）へ遷移するため、axiosにrリダイレクトURLを返信。
        return response()->json([
            'redirect' => route('quiz', ['type' => $type, 'id' => $id])
        ], Response::HTTP_OK); // 選択した問題(年度か分野)のid
    }

    public function quiz(Request $request, $type, $id){
        $title = $type === 'year' ? QuizYear::find($id)->name : QuizCategory::find($id)->name;
        $setting = Setting::where('user_id', Auth::id())->first();

        // VueでリレーションできるようにEager Loadingで明示化 + 取得順序指定
        if($setting->order === 'asc') $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->orderBy('id', 'asc')->take($setting->number)->get();
        else if($setting->order === 'desc') $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->orderBy('id', 'desc')->take($setting->number)->get();
        else $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->inRandomOrder()->take($setting->number)->get();

        return Inertia::render('Quizzes/QuizPage',[
            'type' => $type,
            'id' => $id,
            'title' => $title,
            'limit' => $setting->limit,
            'limit_time' => $setting->limit_time,
            'quizzes' => $quizzes
        ]);
    }

    public function quiz_store(Request $request){
        $input_result = $request['result'];
        $result = Result::create([
            'quiz_id' => $input_result['quiz_id'],
            'user_id' => Auth::id(),
            'is_correct' => $input_result['is_correct']
        ]);
        return response()->json([
            'quiz_id' => $result->quiz_id,
            'user_id' => $result->user_id,
            'is_correct' => $result->is_correct
        ], Response::HTTP_OK);
    }

    public function quiz_result($type, $id){
        $title = $type === 'year' ? QuizYear::find($id)->name : QuizCategory::find($id)->name;
        $setting = Setting::where('user_id', Auth::id())->first();

        // 正解数を取得
        $correct_num = 0;
        $results = Result::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take($setting->number)->get();
        foreach($results as $result){
            if($result['is_correct'] == true) $correct_num++;
        }

        return Inertia::render('Quizzes/QuizResultPage',[
            'type' => $type,
            'id' => $id,
            'title' => $title,
            'total_num' => $setting->number,
            'correct_num' => $correct_num,
        ]);
    }

    public function quiz_result_detail($type, $id){
        $title = $type === 'year' ? QuizYear::find($id)->name : QuizCategory::find($id)->name;
        $setting = Setting::where('user_id', Auth::id())->first();

        // 問題を取得
        if($setting->order === 'asc') $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->orderBy('id', 'asc')->take($setting->number)->get();
        else if($setting->order === 'desc') $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->orderBy('id', 'desc')->take($setting->number)->get();
        else $quizzes = Quiz::with('choices', 'quiz_year', 'quiz_category')->where('quiz_'.$type.'_id', $id)->inRandomOrder()->take($setting->number)->get();

        // 最新の結果（= 解いた問題の結果）を取得
        $results = Result::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take($setting->number)->get();
        $results = $results->reverse()->values();

        return Inertia::render('Quizzes/QuizResultDetailPage',[
            'type' => $type,
            'id' => $id,
            'title' => $title,
            'results' => $results,
            'quizzes' => $quizzes
        ]);
    }
}
