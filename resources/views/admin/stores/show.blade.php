<!-- resources/views/admin/stores/show.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">店舗詳細</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p><strong>店舗名:</strong> {{ $store->name }}</p>
        <p><strong>郵便番号:</strong> {{ $store->zip1 }}-{{ $store->zip2 }}</p>
        <p><strong>住所:</strong> {{ $store->address }}</p>
        <p><strong>建物:</strong> {{ $store->build }}</p>
        <p><strong>備考:</strong> {{ $store->contents }}</p>
        <p><strong>ホームページ:</strong> <a href="{{ $store->url }}" target="_blank">{{ $store->url }}</a></p>
        <p><strong>画像:</strong> <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" class="w-32 h-32 object-cover"></p>
    </div>

    <a href="{{ route('admin.stores.index') }}" class="text-teal-600 hover:text-teal-800 transition duration-300 mt-4 inline-block">戻る</a>
@endsection
