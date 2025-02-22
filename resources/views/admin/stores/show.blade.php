@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">店舗情報詳細</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p><strong>店舗名:</strong> {{ $store->name }}</p>
    <p><strong>郵便番号:</strong> {{ $store->zip1 }} - {{ $store->zip2 }}</p>
    <p><strong>住所:</strong> {{ $store->address }}</p>
    <p><strong>建物:</strong> {{ $store->build }}</p>
    <p><strong>備考:</strong> {{ $store->contents }}</p>
    <p><strong>ホームページURL:</strong>
        @if($store->url)
            <a href="{{ $store->url }}" class="text-blue-600 hover:underline" target="_blank">{{ $store->url }}</a>
        @else
            設定なし
        @endif
    </p>

    @if ($store->image)
    <p><strong>店舗画像:</strong></p>
    <img src="{{ asset('storage/' . $store->image) }}" alt="店舗画像" class="mt-2 rounded-lg shadow-md" width="200">
    @endif

    <!-- 戻るボタン -->
    <div class="mt-6">
        <a href="{{ route('adminStoreControllerIndex') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
            店舗一覧に戻る
        </a>
    </div>
</div>
@endsection
