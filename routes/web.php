<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// トップページ
Route::get('/', function () {
    return view('welcome');
});

// 会社紹介ページ
Route::get('/about', function () {
    return view('about');
});

//コンタクトフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('index');
//確認ページ
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('confirm');
//送信完了ページ
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('send');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
