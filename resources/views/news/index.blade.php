@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">📢 お知らせ一覧</h1>

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <ul class="w-full flex flex-col space-y-6">
        @foreach ($news as $item)
            <li class="w-full">
                <!-- タイトル（クリックで詳細へ） -->
                <a href="{{ route('newsShow', $item->id) }}" 
                   class="block text-lg font-bold text-gray-900 hover:text-teal-600 transition duration-200">
                    {{ $item->title }}
                </a>
                
                <!-- 公開日 -->
                <p class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($item->published_at)->locale('ja')->isoFormat('YYYY年MM月DD日 (ddd)') }}
                </p>
            </li>
        @endforeach
    </ul>
</div>

<!-- ページネーション -->
<div class="mt-8 text-center">
    {{ $news->links('vendor.pagination.tailwind') }}
</div>
@endsection
