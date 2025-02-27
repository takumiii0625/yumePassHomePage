<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\StoreController as FrontendStoreController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Auth;


// トップページ
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendStoreController::class, 'showStores']);

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
    // ダッシュボードにアクセスした際に、admin.stores.index へリダイレクト
    return redirect()->route('adminStoreControllerIndex');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//利用規約ページ
Route::get('/user-agreement', function () {
    return view('user-agreement');
});

//プライバシーポリシーページ
Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});

//特商法取引ページ
Route::get('/tokuteisyoutorihiki', function () {
    return view('tokuteisyoutorihiki');
});

// 管理者用の店舗CRUDルート
// Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
//     Route::resource('stores', AdminStoreController::class);
// });

// フロントエンドの店舗一覧ページ
Route::get('/stores', [FrontendStoreController::class, 'showStores']);

// 店舗一覧
Route::get('admin/stores', [AdminStoreController::class, 'index'])->name('adminStoreControllerIndex');

//店舗詳細ページ
Route::get('admin/stores/{id}', [AdminStoreController::class, 'show'])->name('adminStoreControllerShow');

// 店舗登録(入力)
Route::get('admin/stores/create/input', [AdminStoreController::class, 'createInput'])->name('adminStoreControllerInput');
// 店舗登録(確認)
Route::post('admin/stores/create/confirm', [AdminStoreController::class, 'createConfirm'])->name('adminStoreControllerConfirm');
// 店舗登録(処理)
Route::post('admin/stores/create/complete', [AdminStoreController::class, 'createExecute'])->name('adminStoreControllerExecute');
// 店舗登録(完了)
Route::get('admin/stores/create/complete', [AdminStoreController::class, 'createComplete'])->name('adminStoreControllerComplete');

// 店舗編集(入力)
Route::get('/admin/stores/{id}/edit', [AdminStoreController::class, 'editInput'])->name('adminStoreControllerEditInput');
// 店舗編集(確認)
Route::post('/admin/stores/{id}/edit/confirm', [AdminStoreController::class, 'editConfirm'])->name('adminStoreControllerEditConfirm');
// 店舗編集(処理)
Route::post('/admin/stores/{id}/edit/execute', [AdminStoreController::class, 'editExecute'])->name('adminStoreControllerEditExecute');
// 店舗編集(完了)
Route::get('/admin/stores/{id}/edit/complete', [AdminStoreController::class, 'editComplete'])->name('adminStoreControllerEditComplete');
// 店舗削除
Route::post('/admin/stores/{id}/delete', [AdminStoreController::class, 'deleteExecute'])->name('adminStoreControllerDeleteExecute');
// 店舗詳細
Route::get('/admin/stores/{id}', [AdminStoreController::class, 'show'])->name('adminStoreControllerShow');


// お知らせ一覧
Route::get('/admin/store', [AdminNewsController::class, 'index'])->name('adminNewsIndex');

// お知らせ詳細ページ
Route::get('/admin/news/{id}', [AdminNewsController::class, 'show'])->name('adminNewsShow');

// お知らせ登録(入力)
Route::get('/admin/news/create/input', [NewsController::class, 'createInput'])->name('adminNewsCreateInput');
// お知らせ登録(確認)
Route::post('/admin/news/create/confirm', [NewsController::class, 'createConfirm'])->name('adminNewsCreateConfirm');
// お知らせ登録(処理)
Route::post('/admin/news/create/execute', [NewsController::class, 'createExecute'])->name('adminNewsCreateExecute');
// お知らせ登録(完了)
Route::get('/admin/news/create/complete', [NewsController::class, 'createComplete'])->name('adminNewsCreateComplete');


// お知らせ編集(入力)
Route::get('/admin/news/{id}/edit', [AdminNewsController::class, 'editInput'])->name('adminNewsEditInput');
// お知らせ編集(確認)
Route::post('/admin/news/{id}/edit/confirm', [AdminNewsController::class, 'editConfirm'])->name('adminNewsEditConfirm');
// お知らせ編集(処理)
Route::post('/admin/news/{id}/edit/execute', [AdminNewsController::class, 'editExecute'])->name('adminNewsEditExecute');
// お知らせ編集(完了)
Route::get('/admin/news/{id}/edit/complete', [AdminNewsController::class, 'editComplete'])->name('adminNewsEditComplete');
// お知らせ削除
Route::post('/admin/news/{id}/delete', [AdminNewsController::class, 'deleteExecute'])->name('adminNewsDeleteExecute');



//ログアウト
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


require __DIR__.'/auth.php';
