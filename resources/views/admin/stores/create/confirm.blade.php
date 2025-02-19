<!-- resources/views/admin/stores/confirm.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">店舗情報の確認</h1>

    <form action="{{ route('adminStoreControllerExecute') }}" method="POST">
        @csrf
        @method('POST')

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">店舗名</label>
                <p>{{ $store['name'] }}</p>
            </div>

            <div>
                <label for="zip1" class="block text-lg font-medium text-gray-700">郵便番号1</label>
                <p>{{ $store['zip1'] }}</p>
            </div>

            <div>
                <label for="zip2" class="block text-lg font-medium text-gray-700">郵便番号2</label>
                <p>{{ $store['zip2'] }}</p>
            </div>

            <div>
                <label for="address" class="block text-lg font-medium text-gray-700">住所</label>
                <p>{{ $store['address'] }}</p>
            </div>

            <div>
                <label for="build" class="block text-lg font-medium text-gray-700">建物</label>
                <p>{{ $store['build'] }}</p>
            </div>

            <div>
                <label for="contents" class="block text-lg font-medium text-gray-700">備考</label>
                <p>{{ $store['contents'] }}</p>
            </div>

            <div>
                <label for="url" class="block text-lg font-medium text-gray-700">ホームページURL</label>
                <p>{{ $store['url'] }}</p>
            </div>

            <div>
                <label for="image" class="block text-lg font-medium text-gray-700">画像</label>

            </div>

            <div class="mt-4">
                <button type="submit" class="w-full bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">この内容で登録する</button>
            </div>
            <div class="mt-2">
                <a href="{{ route('adminStoreControllerInput') }}" class="w-full text-center inline-block py-2 px-4 rounded-lg border border-gray-300 hover:bg-gray-100 transition duration-300">修正する</a>
            </div>
        </div>
    </form>
@endsection
