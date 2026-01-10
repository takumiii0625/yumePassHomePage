<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\StoreVoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class StoreVoiceController extends Controller
{
    /**
     * 一覧
     */
    public function index(Request $request)
    {
        $voices = StoreVoice::query()
            ->where('delete_flg', 0)
            ->with(['store:id,name'])
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin/store_voices/index', compact('voices'));
    }

    /**
     * 登録フォーム
     */
    public function create()
    {
        // 店舗選択用（論理削除除外）
        $stores = Store::where('delete_flg', 0)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin/store_voices/create', compact('stores'));
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_id'       => ['required', 'integer', 'exists:stores,id'],
            'title'          => ['nullable', 'string', 'max:255'],
            'excerpt'        => ['nullable', 'string', 'max:400'],
            'body'           => ['nullable', 'string'],
            'interviewed_at' => ['nullable', 'date'],
            'published_at'   => ['nullable', 'date'], // dateTimeでもOK（画面入力に合わせて）
            'is_published'   => ['nullable', 'boolean'],
            'sort_order'     => ['nullable', 'integer'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'], // 5MB
        ]);

        // checkbox対策（未チェックだと入ってこない）
        $validated['is_published'] = (bool)($validated['is_published'] ?? false);

        // published_at 制御：
        // - 入力あり → その日時（dateなら 00:00:00）
        // - 入力なし & 公開ON → 今（即時公開）
        // - 入力なし & 公開OFF → null
        if (!empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::parse($validated['published_at']);
        } else {
            $validated['published_at'] = $validated['is_published'] ? Carbon::now() : null;
        }

        // 画像保存（public/images）
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $filename = uniqid('voice_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                $validated['image'] = 'images/' . $filename;
            } else {
                // アップロード失敗時は null
                $validated['image'] = null;
            }
        } else {
            $validated['image'] = null;
        }

        $validated['sort_order'] = (int)($validated['sort_order'] ?? 0);
        $validated['delete_flg'] = 0;

        try {
            DB::beginTransaction();
            $voice = StoreVoice::create($validated);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('ERROR ' . __METHOD__ . ':' . __LINE__ . " {$e}");

            return back()->withInput()->with('error', '登録に失敗しました。時間をおいて再度お試しください。');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('ERROR ' . __METHOD__ . ':' . __LINE__ . " {$e}");

            return back()->withInput()->with('error', '予期せぬエラーが発生しました。');
        }

        return redirect()->route('adminIndex')->with('success', '店舗の声を登録しました。');

    }

    /**
     * 編集フォーム
     */
    public function edit($id)
    {
        $voice = StoreVoice::where('delete_flg', 0)
            ->with(['store:id,name'])
            ->find($id);

        if (!$voice) {
            return redirect()->route('adminStoreVoiceIndex')->with('error', 'データが存在しません。');
        }

        $stores = Store::where('delete_flg', 0)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin/store_voices/edit', compact('voice', 'stores'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
        $voice = StoreVoice::where('delete_flg', 0)->find($id);

        if (!$voice) {
            return redirect()->route('adminStoreVoiceIndex')->with('error', 'データが存在しません。');
        }

        $validated = $request->validate([
            'store_id'       => ['required', 'integer', 'exists:stores,id'],
            'title'          => ['nullable', 'string', 'max:255'],
            'excerpt'        => ['nullable', 'string', 'max:400'],
            'body'           => ['nullable', 'string'],
            'interviewed_at' => ['nullable', 'date'],
            'published_at'   => ['nullable', 'date'],
            'is_published'   => ['nullable', 'boolean'],
            'sort_order'     => ['nullable', 'integer'],
            'image'          => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image'   => ['nullable', 'boolean'],
        ]);

        // 画像削除（チェックされた場合）→ 最優先
        if ((bool)($validated['remove_image'] ?? false)) {

            if (!empty($voice->image)) {
                $oldPath = public_path($voice->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            // DBにはnullで保存（画像なしにする）
            $validated['image'] = null;

        } else {

            // 新しい画像が来たら差し替え
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // アップロードが成功している時だけ処理
                if ($file && $file->isValid()) {

                    // 古い画像を削除（あれば）
                    if (!empty($voice->image)) {
                        $oldPath = public_path($voice->image);
                        if (file_exists($oldPath)) {
                            @unlink($oldPath);
                        }
                    }

                    $filename = uniqid('voice_') . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images'), $filename);

                    // DBには public からの相対パスを保存
                    $validated['image'] = 'images/' . $filename;

                } else {
                    // 失敗したアップロードは更新しない（既存保持）
                    unset($validated['image']);
                }

            } else {
                // 画像未選択なら更新しない（既存保持）
                unset($validated['image']);
            }
        }

        // remove_image 自体はDBに不要なので外す
        unset($validated['remove_image']);


        $validated['is_published'] = (bool)($validated['is_published'] ?? false);
        $validated['sort_order'] = (int)($validated['sort_order'] ?? 0);

        if (!empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::parse($validated['published_at']);
        } else {
            // 入力が無い場合：
            // 公開ONでpublished_atが空なら今を入れる
            // 公開OFFなら既存値を維持（上書きしない）
            if ($validated['is_published'] && empty($voice->published_at)) {
                $validated['published_at'] = Carbon::now();
            } else {
                unset($validated['published_at']); // 更新対象から外す
            }
        }

        try {
            DB::beginTransaction();
            $voice->update($validated);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('ERROR ' . __METHOD__ . ':' . __LINE__ . " {$e}");

            return back()->withInput()->with('error', '更新に失敗しました。時間をおいて再度お試しください。');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('ERROR ' . __METHOD__ . ':' . __LINE__ . " {$e}");

            return back()->withInput()->with('error', '予期せぬエラーが発生しました。');
        }

        return redirect()->route('adminIndex')->with('success', '店舗の声を更新しました。');

    }

    /**
     * 論理削除
     */
    public function delete(Request $request, $id)
    {
        $voice = StoreVoice::where('delete_flg', 0)->find($id);

        if (!$voice) {
            return redirect()->route('adminStoreVoiceIndex')->with('error', 'データが存在しません。');
        }

        try {
            DB::beginTransaction();
            $voice->update([
                'delete_flg' => 1,
                'updated_at' => now(),
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('ERROR ' . __METHOD__ . ':' . __LINE__ . " {$e}");

            return back()->with('error', '削除に失敗しました。');
        }

        return redirect()->route('adminStoreVoiceIndex')->with('success', '削除しました。');
    }
    
}
