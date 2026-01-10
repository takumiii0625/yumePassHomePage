<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreVoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function showStores()
    {
        // 既存：店舗一覧
        $stores = Store::where('delete_flg', 0)->paginate(10);

        // 追加：店舗の声（公開のみ）
        $voices = StoreVoice::where('delete_flg', 0)
            ->where('is_published', 1)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())   // ←未来公開は出さない
            ->with('store:id,name')
            ->orderBy('sort_order')                        // ←表示順を最優先（小さいほど上）
            ->orderByDesc('published_at')                  // ←同順なら公開日新しい順
            ->orderByDesc('id')                            // ←最後の安定化
            ->take(3)
            ->get();

        return view('welcome', compact('stores', 'voices'));
    }
}
