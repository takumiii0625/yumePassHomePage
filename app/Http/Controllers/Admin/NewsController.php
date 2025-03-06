<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\News;
use App\Models\Store;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use Illuminate\Database\QueryException;

use Carbon\Carbon;

class NewsController extends Controller
{
    // お知らせ一覧
    public function index()
    {
        $stores = Store::where('delete_flg', 0)->paginate(10);
        $news = News::where('delete_flg', 0)->orderBy('published_at', 'desc')->paginate(10);

        return view('admin/index', compact('stores', 'news'));
    }


    // お知らせ登録(入力)
    public function createInput()
    {
        return view('admin/news/create/input');
    }

    // お知らせ登録(確認)
    public function createConfirm(CreateRequest $request)
    {
        $insert = $request->validated(); // バリデーション済みのデータを取得
        session(['insertNews' => $insert]); // セッションに保存

        return view('admin/news/create/confirm', compact('insert'));
    }

    // お知らせ登録(処理)
    public function createExecute(Request $request)
    {
        if ($request->back) {
            return redirect()->route('adminNewsCreateInput');
        }

        $request->session()->regenerateToken();
        $insert = session('insertNews');

        try {
            DB::beginTransaction();
            DB::table('news')->insert($insert);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error("ERROR: News Insert Failed", ['error' => $e->getMessage()]);
            return redirect()->route('adminNewsCreateInput');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("ERROR: Unexpected News Insert Error", ['error' => $e->getMessage()]);
            return redirect()->route('adminNewsCreateInput');
        }

        return redirect()->route('adminNewsCreateComplete');
    }


    // お知らせ登録(完了)
    public function createComplete()
    {
        session()->forget(['insertNews']);
        return view('admin/news/create/complete');
    }


    // お知らせ編集(入力)
    public function editInput($id)
    {
        $news = News::where('id', $id)->where('delete_flg', 0)->first();

        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        return view('admin/news/edit/input', compact('news'));
    }

        // お知らせ編集(確認)
        public function editConfirm(EditRequest $request, $id)
    {
        $input = $request->validated();
        $news = News::where('id', $id)->where('delete_flg', 0)->first();

        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        session(['updateInputNews' => $input, 'updateNews' => $input]);

        return view('admin/news/edit/confirm', compact('input', 'news'));
    }

    // お知らせ編集(処理)
    public function editExecute(Request $request, $id)
    {
        if ($request->back) {
            return redirect()->route('adminNewsEditInput', ['id' => $id])->withInput(session('updateInputNews'));
        }

        $news = News::where('id', $id)->where('delete_flg', 0)->first();
        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        $request->session()->regenerateToken();
        $update = session('updateNews');

        try {
            DB::beginTransaction();
            DB::table('news')->where('id', $id)->where('delete_flg', 0)->update($update);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error("ERROR: News Update Failed", ['error' => $e->getMessage()]);
            return redirect()->route('adminNewsEditInput', ['id' => $id]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("ERROR: Unexpected News Update Error", ['error' => $e->getMessage()]);
            return redirect()->route('adminNewsEditInput', ['id' => $id]);
        }

        return redirect()->route('adminNewsEditComplete', ['id' => $id]);
    }

    public function editComplete(Request $request, $id)
    {
        // フォームで使ったセッションを削除（途中でやめた場合を考慮）
        session()->forget(['updateInputNews', 'updateNews']);

        // お知らせ情報を取得
        $news = News::where('id', $id)->first();

        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        return view('admin/news/edit/complete', compact('news'));
    }

    // お知らせ削除
    public function deleteExecute(Request $request, $id)
    {
        $request->session()->regenerateToken();
        $news = News::where('id', $id)->first();

        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        try {
            DB::beginTransaction();
            DB::table('news')->where('id', $id)->update([
                'delete_flg' => 1,
                'updated_at' => Carbon::now()
            ]);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error("ERROR: News Delete Failed", ['error' => $e->getMessage()]);
            return redirect()->route('adminIndex')->with('error', '削除に失敗しました。');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("ERROR: Unexpected News Delete Error", ['error' => $e->getMessage()]);
            return redirect()->route('adminIndex')->with('error', '削除に失敗しました。');
        }

        return redirect()->route('adminIndex')->with('success', 'お知らせを削除しました。');
    }

    // お知らせ詳細
    public function show($id)
    {
        $news = News::where('id', $id)->where('delete_flg', 0)->first();

        if (!$news) {
            return redirect()->route('adminIndex')->with('error', 'お知らせが存在しません。');
        }

        return view('admin/news/show', compact('news'));
    }

}


