@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">お知らせ詳細</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p><strong>タイトル:</strong> {{ $news->title }}</p>
    <p><strong>内容:</strong></p>
    <p class="border p-4 rounded-md bg-gray-100">{{ nl2br(e($news->content)) }}</p>
    <p><strong>公開日:</strong>
    {{ \Carbon\Carbon::parse($news->published_at)->locale('ja')->isoFormat('YYYY年MM月DD日 (ddd)') }}
</p>


    <!-- 戻るボタン -->
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('adminIndex') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
            お知らせ一覧に戻る
        </a>
        <a href="{{ route('adminNewsEditInput', ['id' => $news->id]) }}" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700">
            編集する
        </a>
    </div>
</div>
@endsection
