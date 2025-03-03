@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">お知らせの追加</h1>

<form action="{{ route('adminNewsCreateConfirm') }}" method="POST" class="space-y-6" novalidate>
    @csrf

    <!-- タイトル -->
    <div>
        <label for="title" class="block text-lg font-medium text-gray-700">タイトル</label>
        <input type="text" name="title" value="{{ old('title') }}" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('title') border-red-500 bg-red-50 @enderror">
        @error('title') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <!-- 内容 -->
    <div>
        <label for="content" class="block text-lg font-medium text-gray-700">内容</label>
        <textarea name="content" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('content') border-red-500 bg-red-50 @enderror">{{ old('content') }}</textarea>
        @error('content') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <!-- 公開日 -->
    <div>
        <label for="published_at" class="block text-lg font-medium text-gray-700">公開日</label>
        <input type="date" name="published_at" value="{{ old('published_at') }}"
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('published_at') border-red-500 bg-red-50 @enderror">
        @error('published_at') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <!-- 確認ボタン -->
    <div>
        <button type="submit" class="w-full bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">
            確認画面へ
        </button>
    </div>
</form>

<!-- お知らせ一覧へ戻るボタン -->
<div class="mt-4">
    <a href="{{ route('adminIndex') }}" class="w-full bg-gray-300 text-black py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300">
        お知らせ一覧に戻る
    </a>
</div>
@endsection
