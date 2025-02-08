<!-- resources/views/stores/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="py-20 bg-gray-900 text-center text-white">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold mb-6">サブスクが使えるお店</h3>
            <p class="text-lg mb-8">以下の店舗でサブスクリプション特典を利用できます！</p>
            <div class="flex justify-center space-x-8">
                @foreach ($stores as $store)
                    <div class="bg-gray-700 p-6 rounded-lg shadow-xl w-1/4">
                        <h4 class="font-semibold text-white">{{ $store->name }}</h4>
                        <p class="text-gray-300">{{ $store->location }}</p>
                        <p class="text-gray-400">{{ $store->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- ページネーションのリンクを表示 -->
            <div class="mt-8">
                {{ $stores->links() }}
            </div>
        </div>
    </div>
@endsection
