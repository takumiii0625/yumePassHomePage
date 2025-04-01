<?php

// app/Http/Controllers/Admin/StoreController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Http\Requests\Admin\Store\CreateRequest;
use App\Http\Requests\Admin\Store\EditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Models\News;
use Carbon\Carbon;
class StoreController extends Controller
{
    // 店舗一覧の表示
    public function index()
    {
        $stores = Store::where('delete_flg', 0)->paginate(10);
        $news = News::where('delete_flg', 0)->orderBy('published_at', 'desc')->paginate(10);

        return view('admin/index', compact('stores', 'news'));
    }

    // 店舗登録(入力)
    public function createInput()
    {
        return view('admin/stores/create/input');
    }

    // 店舗登録(確認)
    public function createConfirm(CreateRequest $request)
    {
        $validated = $request->validated();

        // 画像処理
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $tempPath = 'tmp_images/' . $filename;

            // 一時フォルダに保存
            $image->move(public_path('tmp_images'), $filename);

            // パスを保存
            $validated['image'] = $tempPath;
        } else {
            $validated['image'] = null;
        }

        session(['insertStore' => $validated]);

        return view('admin/stores/create/confirm', ['store' => $validated]);
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

        // 画像が一時保存されている場合 → 本保存に移動
        if (!empty($insert['image'])) {
            $tmpPath = public_path($insert['image']); // tmp_images/xxx.jpg
            $filename = basename($insert['image']);
            $finalPath = 'images/' . $filename;

            if (file_exists($tmpPath)) {
                // tmp → images へ移動
                rename($tmpPath, public_path($finalPath));
                $insert['image'] = $finalPath; // 保存先パスに更新
            } else {
                // 一時ファイルがない場合はnullにする
                $insert['image'] = null;
            }
        } else {
            $insert['image'] = null;
        }

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


    // 店舗編集(入力)
    public function editInput(Request $request, $id)
    {
        // 編集対象の店舗情報を取得
        $store = DB::table('stores')
            ->where('id', $id)
            ->where('delete_flg', 0) // 論理削除されていないデータ
            ->first();

        // 店舗が存在しない場合はリダイレクト
        if (!$store) {
            return redirect()->route('adminIndex', session('adminStoreIndexSearchParams'))
                ->with('error', '店舗が存在しません。');
        }

        return view('admin/stores/edit/input', compact('store'));
    }


    // 店舗編集(確認)
    public function editConfirm(EditRequest $request, $id)
    {
        // バリデーション済みデータの取得
        $input = $request->validated();

        // 編集対象の店舗情報を取得
        $store = DB::table('stores')
            ->where('id', $id)
            ->where('delete_flg', 0)
            ->first();

        // 店舗が存在しない場合はリダイレクト
        if (!$store) {
            return redirect()->route('adminIndex', session('adminStoreIndexSearchParams'))
                ->with('error', '店舗が存在しません。');
        }

        // データを整形
        foreach ($input as $key => $value) {
            switch ($key) {
                default:
                    $assign['confirm'][$key] = $value ?? '未設定';
                    $update[$key] = $value;
                    break;
            }
        }

        // セッションに保存（戻るボタンを押した場合に元の値を保持）
        session(['updateInputStore' => $input, 'updateStore' => $update]);

        return view('admin/stores/edit/confirm', compact('assign', 'store'));
    }


    // 店舗編集(処理)
    public function editExecute(Request $request, $id)
    {
        // 書き直し処理
        if ($request->back) {
            return redirect()->route('adminStoreControllerEditInput', ['id' => $id])->withInput(session('updateInputStore'));
        }

        // 店舗情報を取得（削除されていないデータのみ）
        $store = DB::table('stores')
            ->where('id', $id)
            ->where('delete_flg', 0)
            ->first();

        // 店舗が存在しない場合はリダイレクト
        if (!$store) {
            return redirect()->route('adminIndex')
                ->with('error', '店舗が存在しません。');
        }

        // CSRFトークンを再生成
        $request->session()->regenerateToken();

        // 更新データをセッションから取得
        $update = session('updateStore');

        try {
            DB::beginTransaction();

            // 更新処理
            DB::table('stores')
                ->where('id', $id)
                ->where('delete_flg', 0)
                ->update($update);

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $params = implode(', ', $e->getBindings());
            Log::error('ERROR'.__METHOD__.'#'.__LINE__."\nSQL: {$e->getSql()}\nParams: {$params}\n{$e}\n\n");

            return redirect()->route('adminStoreControllerEditInput', ['id' => $id])
                ->withInput(session('updateInputStore'))
                ->with('error', 'データベースエラーが発生しました。時間をおいて再度お試しください。');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('ERROR'.__METHOD__.'#'.__LINE__." >>> {$e}\n\n");

            return redirect()->route('adminStoreControllerEditInput', ['id' => $id])
                ->withInput(session('updateInputStore'))
                ->with('error', '予期せぬエラーが発生しました。時間をおいて再度お試しください。');
        }

        // 更新完了後のリダイレクト
        return redirect()->route('adminStoreControllerEditComplete', ['id' => $id]);
    }


    // 店舗編集(完了)
    public function editComplete(Request $request, $id)
    {
        // フォームで使ったセッションを削除（途中でやめた場合を考慮）
        session()->forget(['updateInputStore', 'updateStore']);

        // 店舗情報を取得
        $store = DB::table('stores')->where('id', $id)->first();

        // 画面に渡すデータ
        $assign = [
            'id' => $id,
            'name' => $store->name ?? '不明な店舗',
        ];

        return view('admin/stores/edit/complete', compact('assign'));
    }


    //店舗削除
    public function deleteExecute(Request $request, $id)
        {
            // CSRFトークンの再生成
            $request->session()->regenerateToken();

            // 削除対象の店舗を取得
            $store = DB::table('stores')->where('id', $id)->first();

            // 店舗が存在しない場合はリダイレクト
            if (!$store) {
                return redirect()->route('adminIndex')->with('error', '店舗が存在しません。');
            }

            try {
                DB::beginTransaction();

                // 論理削除（delete_flg を 1 にする）
                DB::table('stores')->where('id', $id)->update([
                    'delete_flg' => 1,
                    'updated_at' => Carbon::now()
                ]);

                DB::commit();
            } catch (QueryException $e) {
                DB::rollBack();
                $params = implode(', ', $e->getBindings());
                Log::error('ERROR'.__METHOD__.'#'.__LINE__."\nSQL: {$e->getSql()}\nParams: {$params}\n{$e}\n\n");

                return redirect()->route('adminIndex')
                    ->with('error', 'データベースエラーが発生しました。時間をおいて再度お試しください。');
            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error('ERROR'.__METHOD__.'#'.__LINE__." >>> {$e}\n\n");

                return redirect()->route('adminIndex')
                    ->with('error', '予期せぬエラーが発生しました。時間をおいて再度お試しください。');
            }

            return redirect()->route('adminIndex')->with('success', '店舗を削除しました。');
        }


    //店舗詳細画面
    public function show(Request $request, $id)
        {
            // フォームで使ったセッションを削除（途中でやめた場合を考慮）
            session()->forget(['createInputStore', 'insertStore', 'updateInputStore', 'updateStore']);

            // 店舗情報を取得（削除されていないもののみ）
            $store = DB::table('stores')
                ->where('id', $id)
                ->where('delete_flg', 0)
                ->first();

            // 店舗が存在しない場合はリダイレクト
            if (!$store) {
                return redirect()->route('adminIndex')->with('error', '店舗が存在しません。');
            }

            return view('admin/stores/show', compact('store'));
        }

}

