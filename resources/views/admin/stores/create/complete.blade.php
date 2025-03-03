<!-- resources/views/admin/stores/success.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">登録が完了しました</h1>

    <div class="bg-green-200 text-green-800 p-6 rounded-lg mb-8 shadow-lg transform transition duration-300 hover:scale-105">
        <p>店舗情報が正常に登録されました。</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('adminIndex') }}" class="w-full bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">店舗一覧に戻る</a>
    </div>
@endsection
