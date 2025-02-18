<?php

// app/Http/Controllers/Admin/StoreController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Http\Requests\Admin\Store\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
class StoreController extends Controller
{
    // 店舗一覧の表示
    public function index()
    {
        // すべての店舗を取得（ページネーション）
        $stores = Store::paginate(10); // 必要に応じてページごとの店舗数を変更

        // ビューに店舗データを渡す
        return view('admin/stores/index', compact('stores'));
    }

    // 店舗登録(入力)
    public function createInput()
    {
        return view('admin/stores/create/input');
    }

    // 店舗登録(確認)
    public function createConfirm(CreateRequest $request)
    {
        $insert = $request->validated();
        $store = $insert;
        session(['insertStore' => $insert]);

        return view('admin/stores/create/confirm', compact('store'));
    }

    // 店舗登録(処理)
    public function createExecute(Request $request)
    {
        // 書き直し処理
        if ($request->back) {
            return redirect()->route('adminStoreControllerInput');
        }
        $request->session()->regenerateToken();
        // insert用入力値
        $insert = session('insertStore');

        try {
            DB::beginTransaction();
            // 登録
            DB::table('stores')->insert($insert);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $params = implode(', ', $e->getBindings());
            Log::error('ERROR'.__METHOD__.'#'.__LINE__."\nSQL: {$e->getSql()}\nParams: {$params}\n{$e}\n\n");

            return redirect()->route('adminStoreControllerInput');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('ERROR'.__METHOD__.'#'.__LINE__." >>> {$e}\n\n");
            return redirect()->route('adminStoreControllerInput');
        }

        return redirect()->route('adminStoreControllerComplete');

    }
    //店舗登録(完了)
    public function createComplete(Request $request)
    {
        // フォームで使ったセッションを削除（入力途中でやめた場合を考慮）
        session()->forget(['insertStore']);

        return view('admin/stores/create/complete');
    }
}



//     //
//     // 新しい店舗を保存
//     public function store(CreateRequest $request)
//     {
//         // 画像の処理
//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('public/store_images');
//         }

//         // バリデーションは CreateRequest で処理されるので不要
//         // バリデーションが通ったデータを使って新しい店舗を保存
//         Store::create($request->validated());

//         return redirect()->route('admin.stores.index')->with('success', '店舗が追加されました');
//     }

//     // 店舗編集フォームを表示
//     public function edit(Store $store)
//     {
//         return view('admin.stores.edit', compact('store'));
//     }

//     // 店舗情報を更新
//     public function update(CreateRequest $request, Store $store)
//     {
//         // 画像の処理
//         if ($request->hasFile('image')) {
//             // 既存の画像があれば削除
//             if ($store->image) {
//                 Storage::delete('public/store_images/' . $store->image);
//             }
//             $imagePath = $request->file('image')->store('public/store_images');
//             $store->image = str_replace('public/', '', $imagePath);
//         }

//         // バリデーションは CreateRequest で処理されるので不要
//         // バリデーションが通ったデータを使って店舗情報を更新
//         $store->update($request->validated());

//         return redirect()->route('admin.stores.index')->with('success', '店舗情報が更新されました');
//     }

//     // 店舗削除
//     public function destroy(Store $store)
//     {

//         // 画像が存在すれば削除
//         if ($store->image) {
//             Storage::delete('public/store_images/' . $store->image);
//         }

//         $store->delete();

//         return redirect()->route('admin.stores.index')->with('success', '店舗が削除されました');
//     }


//     public function show($id)
//     {
//     $store = Store::findOrFail($id);
//     return view('admin.stores.show', compact('store'));
//     }
// }
