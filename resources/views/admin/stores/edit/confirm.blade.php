@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">店舗情報の確認</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p><strong>店舗名:</strong> {{ $assign['confirm']['name'] }}</p>
    <p><strong>郵便番号:</strong> {{ $assign['confirm']['zip1'] }} - {{ $assign['confirm']['zip2'] }}</p>
    <p><strong>住所:</strong> {{ $assign['confirm']['address'] }}</p>
    <p><strong>建物:</strong> {{ $assign['confirm']['build'] }}</p>
    <p><strong>備考:</strong> {{ $assign['confirm']['contents'] }}</p>
    <p><strong>ホームページURL:</strong> {{ $assign['confirm']['url'] }}</p>

    <!-- 戻るボタン -->
    <form action="{{ route('adminStoreControllerEditInput', $store->id) }}" method="GET" class="mt-4">
        <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">戻る</button>
    </form>

    <!-- 更新ボタン -->
    <form action="{{ route('adminStoreControllerEditExecute', $store->id) }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700">更新する</button>
    </form>
</div>
@endsection
