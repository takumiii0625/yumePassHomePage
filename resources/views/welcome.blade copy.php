@extends('layouts.app')

@section('title')

@section('content')
    <!-- ヒーローセクション -->
    <div class="bg-gradient-to-r from-teal-700 via-teal-600 to-teal-500 text-white py-40">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4 text-white leading-tight">あなたの好きな料理がすぐに見つかる！</h1>
            <p class="text-2xl mb-8">アプリをインストールして、サブスクリプション特典を楽しもう！</p>
            <div class="flex justify-center space-x-8">
                <a href="https://apps.apple.com" class="bg-white text-black hover:bg-gray-200 py-3 px-8 rounded-full text-xl transition duration-300 ease-in-out">
                    iOSでダウンロード
                </a>
                <a href="https://play.google.com" class="bg-white text-black hover:bg-gray-200 py-3 px-8 rounded-full text-xl transition duration-300 ease-in-out">
                    Androidでダウンロード
                </a>
            </div>
        </div>
    </div>

    <!-- サブスクリプション特典セクション -->
    <div class="py-20 bg-gray-900 text-center text-white">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-white mb-8">サブスクに登録して、特典をゲット！</h2>
            <p class="text-lg text-gray-300 mb-8">サブスクリプションに登録すると、来店時に1品無料の特典がついてきます！</p>
            <div class="bg-teal-700 p-12 rounded-lg shadow-2xl">
                <h3 class="text-2xl font-semibold text-teal-100 mb-4">サブスクリプション特典</h3>
                <p class="text-xl text-teal-100 mb-6">月額のサブスクリプションで、来店時に無料で1品をお選びいただけます。</p>
                <p class="text-lg text-teal-100 mb-6">サブスク登録はアプリ内で簡単にできます！</p>
            </div>
        </div>
    </div>

    <!-- アプリの画面紹介セクション -->
    <div class="py-20 bg-gray-800 text-center text-white">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold mb-6">アプリの使い方</h3>
            <p class="text-lg mb-8">アプリをダウンロードし、簡単に料理の注文とサブスク特典が楽しめます！</p>
            <div class="flex justify-center space-x-8">
                <div class="w-1/3">
                    <img src="path_to_image" alt="アプリ画面1" class="rounded-lg shadow-lg mb-4">
                    <p class="text-lg">簡単なメニュー注文</p>
                </div>
                <div class="w-1/3">
                    <img src="path_to_image" alt="アプリ画面2" class="rounded-lg shadow-lg mb-4">
                    <p class="text-lg">サブスク特典を使う</p>
                </div>
                <div class="w-1/3">
                    <img src="path_to_image" alt="アプリ画面3" class="rounded-lg shadow-lg mb-4">
                    <p class="text-lg">注文履歴やお気に入りを管理</p>
                </div>
            </div>
        </div>
    </div>

    <!-- サブスクが使えるお店一覧 -->
    <div class="py-20 bg-gray-900 text-center text-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-semibold mb-6">ストパス（Store-Pass）が使えるお店</h3>
            <p class="text-lg mb-8">以下の店舗で特典を利用できます！</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($stores as $store) <!-- 店舗データをループ -->
                    <div class="bg-white p-6 rounded-lg shadow-xl text-gray-900">
                        <!-- 画像 -->
                        @if ($store->image)
                            <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" class="w-full h-40 object-cover rounded-lg mb-4">
                        @else
                            <div class="w-full h-40 bg-gray-300 rounded-lg flex items-center justify-center text-gray-600">
                                画像なし
                            </div>
                        @endif

                        <!-- 店舗情報 -->
                        <h4 class="text-xl font-semibold text-gray-800">{{ $store->name }}</h4>
                        
                        <!-- 郵便番号 -->
                        <p class="text-gray-600 mt-2">〒{{ $store->zip1 }}-{{ $store->zip2 }}</p>

                        <!-- 住所 -->
                        <p class="text-gray-600">{{ $store->address }}</p>

                        <!-- 建物名 (あれば表示) -->
                        @if ($store->build)
                            <p class="text-gray-600">{{ $store->build }}</p>
                        @endif

                        <!-- URL (クリックで飛べる) -->
                        @if ($store->url)
                            <p class="mt-4">
                                <a href="{{ $store->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 transition duration-300">
                                    店舗のウェブサイト
                                </a>
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
