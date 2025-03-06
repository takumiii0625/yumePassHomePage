@extends('layouts.app')

@section('title', '店舗パス')

@section('content')

    <!-- 店舗パス紹介セクション -->
    <div class="py-16 bg-gray-100 text-center text-gray-800">
        <div class="max-w-4xl mx-auto px-6">
            <p class="text-lg sm:text-xl text-gray-600 mb-6 leading-relaxed">
                常連さんがなかなかできない、リピーターを増やしていきたい、、<br>
                そんなお悩みはありませんか？
            </p>
            <p class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 leading-relaxed">
                お店にまた来たくなるサービス<br>
                <span class="text-teal-600">「店舗パス」</span> を導入してみませんか？
            </p>
            <div class="mt-8 p-8 bg-white shadow-lg rounded-xl border border-gray-300">
                <h3 class="text-2xl font-semibold text-teal-700 mb-4">店舗パスとは</h3>
                <p class="text-lg text-gray-700 leading-relaxed">
                    店舗パスは、お店に来れば来るほどお得になる常連さん向けのサービスです。<br>
                    500円のサブスクリプションで、対象店舗に訪れるたびにその店舗の特別なサービスを受けることができます。
                </p>
                <p class="text-lg text-gray-700 mt-4 leading-relaxed">
                    今日のお店が決まっていない、毎回お店選びに悩んでいる、<br>
                    そんなお客様に対して、店舗パスを導入することでメリットを提示し、<br>
                    お店のリピーターへとつなげることが可能です。
                </p>
            </div>
        </div>
    </div>

    <!-- 導入事例セクション -->
    <div class="py-16 bg-white text-center text-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-semibold text-teal-700 mb-8">導入事例</h3>

            <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                店舗名を入れたアプリ名にすることができるため、お客様へ浸透させることができます。<br>
                また、基本機能に加えたカスタマイズも可能なため、店舗独自のアプリとして使用可能です。
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach (['肉横丁' => '肉横パス', '夢' => '夢パス', '〇〇' => '〇〇パス'] as $name => $pass)
                    <div class="bg-gray-100 p-6 shadow-md rounded-xl border border-gray-300 hover:scale-105 transition-all duration-300">
                        <p class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">{{ $name }}</p>
                        <p class="text-lg text-gray-600 mb-4">{{ $pass }}</p>
                        <img src="path_to_image" alt="{{ $name }}の導入事例" class="w-full h-40 object-cover rounded-lg shadow-md">
                    </div>
                @endforeach
            </div>

            <p class="text-lg text-gray-700 mt-12">詳細については、お気軽にお問い合わせフォームよりご相談ください。</p>

            <div class="mt-6">
                <a href="{{ url('/contact') }}" class="bg-teal-600 text-white py-3 px-8 rounded-lg text-lg font-semibold shadow-md transition-all duration-300 hover:bg-teal-700 hover:scale-105">
                    お問い合わせフォーム
                </a>
            </div>
        </div>
    </div>

    <!-- サブスクが使えるお店一覧 -->
    <div class="py-16 bg-gray-100 text-center text-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-semibold mb-6">店舗パスが使えるお店</h3>
            <p class="text-lg mb-8 text-gray-700">以下の店舗でサブスクリプション特典を利用できます！</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($stores as $store)
                    @if ($store->delete_flg != 1)
                        <div class="bg-white p-6 rounded-lg shadow-xl text-gray-900">
                            <!-- 画像 -->
                            @if ($store->image)
                                <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" class="w-full h-40 object-cover rounded-lg mb-4">
                            @else
                                <div class="w-full h-40 bg-gray-300 rounded-lg flex items-center justify-center text-gray-600">
                                    画像なし
                                </div>
                            @endif
                                <!-- 店舗名 -->
                                <h4 class="text-lg sm:text-xl font-semibold text-gray-900">{{ $store->name }}</h4>
                                <!-- 郵便番号 -->
                                <p class="text-gray-700 mt-2">〒{{ $store->zip1 }}-{{ $store->zip2 }}</p>
                                <!-- 住所 -->
                                <p class="text-gray-700">{{ $store->address }}</p>

                            <!-- 建物名 (あれば表示) -->
                            @if ($store->build)
                                <p class="text-gray-600">{{ $store->build }}</p>
                            @endif
                            <!-- URL -->
                            @if ($store->url)
                                <p class="mt-4">
                                    <a href="{{ $store->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 transition duration-300">
                                        店舗のウェブサイト
                                    </a>
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- ヒーローセクション -->
    <div class="bg-gradient-to-r from-teal-600 via-teal-500 to-teal-400 text-white py-32 sm:py-40">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h1 class="text-4xl sm:text-5xl font-semibold mb-4 text-white leading-tight">あなたの好きな料理がすぐに見つかる！</h1>
            <p class="text-lg sm:text-2xl mb-8 text-gray-100">アプリをインストールして、サブスクリプション特典を楽しもう！</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-8">
                <a href="https://apps.apple.com" class="bg-white text-gray-900 py-3 px-8 rounded-lg text-lg font-semibold shadow-md transition-all duration-300 hover:bg-gray-200 hover:scale-105">
                    iOSでダウンロード
                </a>
                <a href="https://play.google.com" class="bg-white text-gray-900 py-3 px-8 rounded-lg text-lg font-semibold shadow-md transition-all duration-300 hover:bg-gray-200 hover:scale-105">
                    Androidでダウンロード
                </a>
            </div>
        </div>
    </div>

@endsection
