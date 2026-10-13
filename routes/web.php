<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

// これはホーム画面へアクセスすると/itemsへリダイレクトする設定。
//備品管理なので親切設計で/itemsへリダイレクト設定している。また/itemsはログイン後の画面なのでログインしていない場合はログイン画面へリダイレクトされる。
Route::redirect('/', '/items');

// 備品一覧画面のネーミング　※ミドルウェアのデフォルトリダイレクト先は/loginになっている
Route::get('/items', [ItemController::class, 'index'])->name('items.index')->middleware('auth');



// ▼ 【テスト用】管理者だけが入れるルートを追加
Route::get('/admin/test', function () {
    return 'ここは管理者専用ページです！';
})->middleware(['auth', 'admin']);




// ▼ 【一時的なテスト用】アクセスしたユーザーを強制的に管理者にするルート
Route::get('/make-me-admin', function () {
    $user = auth()->user();
    if ($user) {
        $user->role = 'admin';
        $user->save();
        return 'あなたのロールを管理者（admin）に変更しました！';
    }
    return 'ログインしてください。';
})->middleware('auth');