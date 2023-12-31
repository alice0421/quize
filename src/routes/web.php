<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('LearningDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->controller(QuizController::class)->group(function () {
    Route::get('/quiz/select', 'select')->name('quiz.select');
    Route::get('/quiz/{type}/{id}/setting', 'setting')->name('quiz.setting');
    Route::post('/quiz/{type}/{id}/setting', 'setting_store')->name('quiz.setting.store');
    Route::get('/quiz/{type}/{id}', 'quiz')->name('quiz');
    Route::post('/quiz', 'quiz_store')->name('quiz.result.store');
    Route::get('/quiz/{type}/{id}/result', 'quiz_result')->name('quiz.result');
    Route::get('/quiz/{type}/{id}/result/detail', 'quiz_result_detail')->name('quiz.result.detail');
});

require __DIR__.'/auth.php';
