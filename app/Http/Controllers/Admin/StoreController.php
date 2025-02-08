<?php

// app/Http/Controllers/Admin/StoreController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    // 店舗一覧の表示
    public function index()
    {
        // すべての店舗を取得（ページネーション）
        $stores = Store::paginate(10); // 必要に応じてページごとの店舗数を変更

        // ビューに店舗データを渡す
        return view('admin.stores.index', compact('stores'));
    }

    // 店舗作成フォームを表示
    public function create()
    {
        return view('admin.stores.create');
    }

    // 新しい店舗を保存
    public function store(StoreRequest $request)
    {
        // バリデーションは StoreRequest で処理されるので不要
        // バリデーションが通ったデータを使って新しい店舗を保存
        Store::create($request->validated());

        return redirect()->route('admin.stores.index')->with('success', '店舗が追加されました');
    }

    // 店舗編集フォームを表示
    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('store'));
    }

    // 店舗情報を更新
    public function update(StoreRequest $request, Store $store)
    {
        // バリデーションは StoreRequest で処理されるので不要
        // バリデーションが通ったデータを使って店舗情報を更新
        $store->update($request->validated());

        return redirect()->route('admin.stores.index')->with('success', '店舗情報が更新されました');
    }

    // 店舗削除
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('admin.stores.index')->with('success', '店舗が削除されました');
    }
}
