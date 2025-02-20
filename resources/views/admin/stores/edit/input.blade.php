@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">店舗情報の編集</h1>

<form action="{{ route('adminStoreControllerEditConfirm', $store->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" novalidate>
    @csrf

    <!-- 店舗名 -->
    <div>
        <label for="name" class="block text-lg font-medium text-gray-700">店舗名</label>
        <input type="text" name="name" value="{{ old('name', $store->name) }}" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('name') border-red-500 bg-red-50 @enderror">
        @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 郵便番号1 -->
    <div>
        <label for="zip1" class="block text-lg font-medium text-gray-700">郵便番号1</label>
        <input type="text" name="zip1" value="{{ old('zip1', $store->zip1) }}" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('zip1') border-red-500 bg-red-50 @enderror">
        @error('zip1')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 郵便番号2 -->
    <div>
        <label for="zip2" class="block text-lg font-medium text-gray-700">郵便番号2</label>
        <input type="text" name="zip2" value="{{ old('zip2', $store->zip2) }}" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('zip2') border-red-500 bg-red-50 @enderror">
        @error('zip2')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 住所 -->
    <div>
        <label for="address" class="block text-lg font-medium text-gray-700">住所</label>
        <input type="text" name="address" value="{{ old('address', $store->address) }}" required
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('address') border-red-500 bg-red-50 @enderror">
        @error('address')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 建物 -->
    <div>
        <label for="build" class="block text-lg font-medium text-gray-700">建物</label>
        <input type="text" name="build" value="{{ old('build', $store->build) }}"
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('build') border-red-500 bg-red-50 @enderror">
        @error('build')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 備考 -->
    <div>
        <label for="contents" class="block text-lg font-medium text-gray-700">備考</label>
        <textarea name="contents"
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('contents') border-red-500 bg-red-50 @enderror">{{ old('contents', $store->contents) }}</textarea>
        @error('contents')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- ホームページURL -->
    <div>
        <label for="url" class="block text-lg font-medium text-gray-700">ホームページURL</label>
        <input type="url" name="url" value="{{ old('url', $store->url) }}"
            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500
            @error('url') border-red-500 bg-red-50 @enderror">
        @error('url')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 画像 -->
    <div>
        <label for="image" class="block text-lg font-medium text-gray-700">画像</label>
        <input type="file" name="image"
            class="mt-1 block w-full text-sm text-gray-500 border rounded-md focus:outline-none focus:ring-teal-500 focus:border-teal-500
            @error('image') border-red-500 bg-red-50 @enderror">
        @if ($store->image)
            <p class="mt-2">現在の画像: <img src="{{ asset('storage/' . $store->image) }}" alt="店舗画像" width="100"></p>
        @endif
        @error('image')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- 更新ボタン -->
    <div>
        <button type="submit" class="w-full bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">確認画面へ</button>
    </div>
</form>

<!-- 店舗一覧へ戻るボタン -->
<div class="mt-4">
    <a href="{{ route('adminStoreControllerIndex') }}" class="w-full bg-gray-300 text-black py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300">店舗一覧に戻る</a>
</div>
@endsection
