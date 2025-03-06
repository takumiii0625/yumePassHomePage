@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">お知らせの確認</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p><strong>タイトル:</strong> {{ $insert['title'] }}</p>
    <p><strong>内容:</strong> {{ $insert['content'] }}</p>
    <p><strong>公開日:</strong> {{ $insert['published_at'] ?? '未設定' }}</p>

    <!-- 戻るボタン -->
    <form action="{{ route('adminNewsCreateInput') }}" method="GET" class="mt-4">
        <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">戻る</button>
    </form>

    <!-- 登録ボタン -->
    <form action="{{ route('adminNewsCreateExecute') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700">登録する</button>
    </form>
</div>
@endsection
