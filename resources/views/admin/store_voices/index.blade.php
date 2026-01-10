<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>店舗の声 一覧</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="max-w-6xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">店舗の声 一覧</h1>
      <a href="{{ route('adminStoreVoiceCreate') }}"
         class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
        新規作成
      </a>
    </div>

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

    <div class="bg-white rounded shadow border border-gray-200 overflow-x-auto">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="text-left p-3 border-b">ID</th>
            <th class="text-left p-3 border-b">店舗</th>
            <th class="text-left p-3 border-b">タイトル</th>
            <th class="text-left p-3 border-b">公開</th>
            <th class="text-left p-3 border-b">公開日</th>
            <th class="text-left p-3 border-b">操作</th>
          </tr>
        </thead>
        <tbody>
          @forelse($voices as $voice)
            <tr class="hover:bg-gray-50">
              <td class="p-3 border-b">{{ $voice->id }}</td>
              <td class="p-3 border-b">{{ $voice->store->name ?? '-' }}</td>
              <td class="p-3 border-b">{{ $voice->title ?? '-' }}</td>
              <td class="p-3 border-b">
                @if($voice->is_published)
                  <span class="inline-block px-2 py-1 text-xs rounded bg-green-100 text-green-700">公開</span>
                @else
                  <span class="inline-block px-2 py-1 text-xs rounded bg-gray-100 text-gray-700">非公開</span>
                @endif
              </td>
              <td class="p-3 border-b">
                {{ $voice->published_at ? \Carbon\Carbon::parse($voice->published_at)->format('Y-m-d') : '-' }}
              </td>
              <td class="p-3 border-b">
                <a href="{{ route('adminStoreVoiceEdit', ['id' => $voice->id]) }}"
                   class="text-blue-600 hover:text-blue-800">
                  編集
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td class="p-3" colspan="6">まだデータがありません。</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      {{ $voices->links() }}
    </div>
  </div>
</body>
</html>
