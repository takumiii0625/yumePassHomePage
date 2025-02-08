<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // 店舗一覧を表示
    public function showStores()
    {
        // 店舗をページネーションで取得（10店舗ごとに分けて表示）
        $stores = Store::paginate(10); // 必要に応じてページごとの店舗数を変更
        // 店舗データをビューに渡す
        return view('welcome', compact('stores'));
    }
}
