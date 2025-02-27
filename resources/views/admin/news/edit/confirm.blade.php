@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">お知らせの確認</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p><strong>タイトル:</strong> {{ $input['title'] }}</p>
    <p><strong>内容:</strong> {!! nl2br(e($input['content'])) !!}</p>
    <p><strong>公開日:</strong> {{ $input['published_at'] ?? '未設定' }}</p>

    <div class="flex space-x-4 mt-6">
        <!-- 戻るボタン -->
        <form action="{{ route('adminNewsEditInput', $news->id) }}" method="GET">
            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">戻る</button>
        </form>

        <!-- 更新ボタン -->
        <form action="{{ route('adminNewsEditExecute', $news->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700">更新する</button>
        </form>
    </div>
</div>
@endsection
