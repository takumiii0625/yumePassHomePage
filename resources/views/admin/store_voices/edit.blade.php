<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>店舗の声 編集</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="max-w-3xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">店舗の声 編集（ID: {{ $voice->id }}）</h1>
      <a href="{{ route('adminIndex') }}" class="text-blue-600 hover:text-blue-800">一覧へ戻る</a>
    </div>

    @if ($errors->any())
      <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
        <ul class="list-disc ml-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('success'))
      <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
        {{ session('success') }}
      </div>
    @endif
    @if (session('error'))
      <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('adminStoreVoiceUpdate', ['id' => $voice->id]) }}" enctype="multipart/form-data" class="bg-white rounded shadow border border-gray-200 p-6 space-y-5">
      @csrf

      <div>
        <label class="block font-semibold mb-1">店舗 <span class="text-red-600">*</span></label>
        <select name="store_id" class="w-full border rounded p-2">
          <option value="">選択してください</option>
          @foreach($stores as $store)
            <option value="{{ $store->id }}" @selected(old('store_id', $voice->store_id) == $store->id)>
              {{ $store->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-semibold mb-1">タイトル</label>
        <input type="text" name="title" value="{{ old('title', $voice->title) }}" class="w-full border rounded p-2" maxlength="255">
      </div>

      <div>
        <label class="block font-semibold mb-1">抜粋（一覧用・400文字まで）</label>
        <textarea name="excerpt" rows="3" class="w-full border rounded p-2" maxlength="400">{{ old('excerpt', $voice->excerpt) }}</textarea>
      </div>

      <div>
        <label class="block font-semibold mb-2">写真</label>

        @if(!empty($voice->image))
          <div class="mb-3">
            <img src="{{ asset($voice->image) }}" alt="店舗の声 画像" class="w-full max-w-md rounded-lg border border-gray-200">
            <p class="text-sm text-gray-500 mt-1">現在の画像</p>
          </div>

          <label class="inline-flex items-center gap-2 mb-3">
            <input type="checkbox" name="remove_image" value="1" class="rounded">
            <span class="text-sm text-gray-700">画像を削除する</span>
          </label>
        @endif

        <input type="file" name="image" accept="image/*" class="w-full border rounded-lg p-3">
        <p class="text-sm text-gray-500 mt-1">※ 選択すると差し替えになります</p>
      </div>

      <div>
        <label class="block font-semibold mb-1">本文</label>
        <textarea name="body" rows="10" class="w-full border rounded p-2">{{ old('body', $voice->body) }}</textarea>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">インタビュー日</label>
          <input type="date" name="interviewed_at"
                 value="{{ old('interviewed_at', $voice->interviewed_at ? \Carbon\Carbon::parse($voice->interviewed_at)->format('Y-m-d') : '') }}"
                 class="w-full border rounded p-2">
        </div>
        <div>
          <label class="block font-semibold mb-1">公開日</label>
          <input type="date" name="published_at"
                 value="{{ old('published_at', $voice->published_at ? \Carbon\Carbon::parse($voice->published_at)->format('Y-m-d') : '') }}"
                 class="w-full border rounded p-2">
        </div>
      </div>

      <div class="flex items-center gap-3">
        <label class="inline-flex items-center gap-2">
          <input type="checkbox" name="is_published" value="1" class="rounded"
                 @checked(old('is_published', (bool)$voice->is_published))>
          <span>公開する</span>
        </label>

        <div class="ml-auto">
          <label class="block font-semibold mb-1">表示順（小さいほど上）</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $voice->sort_order ?? 0) }}" class="w-40 border rounded p-2">
        </div>
      </div>

      <div class="pt-4 flex gap-3">
        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
          更新
        </button>

        <form method="POST" action="{{ route('adminStoreVoiceDelete', ['id' => $voice->id]) }}">
          @csrf
          <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700"
                  onclick="return confirm('削除します。よろしいですか？')">
            削除
          </button>
        </form>

        <a href="{{ route('adminIndex') }}" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-50">
          戻る
        </a>
      </div>
    </form>
  </div>
</body>
</html>
