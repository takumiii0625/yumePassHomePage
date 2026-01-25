<!-- resources/views/stores/index.blade.php -->
@extends('layouts.app')

@push('styles')
<style>
    .rainbow-gradient {
        background: linear-gradient(90deg,
            #ff6b6b, #feca57, #48dbfb, #ff9ff3, #54a0ff, #5f27cd);
        background-size: 200% 200%;
        animation: gradient-shift 3s ease infinite;
    }
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>
@endpush

@section('content')
    <div class="py-20 bg-gradient-to-b from-white to-orange-50 text-center text-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-orange-100 to-red-100 text-orange-600 rounded-full text-sm font-bold mb-4">STORE LIST</span>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">ストパスが使えるお店</h3>
                <p class="text-gray-500 mt-4">以下の店舗でアプリ限定特典を利用できます</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($stores as $store)
                    <div class="group bg-white p-6 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-full h-1 rainbow-gradient transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        <h4 class="font-black text-lg text-gray-900 group-hover:text-orange-600 transition-colors">{{ $store->name }}</h4>
                        <p class="text-gray-500 text-sm mt-2 flex items-center justify-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $store->location }}
                        </p>
                        <p class="text-gray-600 text-sm mt-2">{{ $store->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- ページネーションのリンクを表示 -->
            <div class="mt-12">
                {{ $stores->links() }}
            </div>
        </div>
    </div>
@endsection
