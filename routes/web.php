<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('profile/{user:name}', [QuestionController::class, 'profile'])->name('profile.show');

Route::prefix('questions')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/show/{questions:id}', [QuestionController::class, 'show'])->name('questions.show');

    Route::get('/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/create', [QuestionController::class, 'store'])->name('questions.store');

    Route::get('/edit/{questions:id}', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/edit/{questions:id}', [QuestionController::class, 'update'])->name('questions.update');

    Route::delete('/delete/{questions:id}', [QuestionController::class, 'delete'])->name('questions.delete');
});

Route::prefix('answers')->group(function () {
    Route::post('/create/{questions:id}', [AnswerController::class, 'store'])->name('answers.store');
    Route::delete('/delete/{answers:id}', [AnswerController::class, 'delete'])->name('answers.delete');
});
