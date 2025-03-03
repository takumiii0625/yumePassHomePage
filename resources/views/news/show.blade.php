@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-900 mb-4">{{ $news->title }}</h1>

    <p class="text-gray-500 text-sm mb-4">
        公開日: {{ \Carbon\Carbon::parse($news->published_at)->locale('ja')->isoFormat('YYYY年MM月DD日 (ddd)') }}
    </p>

    <div class="text-gray-800 leading-relaxed">
        {!! nl2br(e($news->content)) !!}
    </div>

    <!-- 戻るボタン -->
    <div class="mt-6">
        <a href="{{ route('newsIndex') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300">
            お知らせ一覧に戻る
        </a>
    </div>
</div>
@endsection
