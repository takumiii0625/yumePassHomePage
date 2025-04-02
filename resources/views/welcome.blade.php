@extends('layouts.app')

@section('title', 'ストパス（Store-Pass）')

@section('content')

    <!-- ストパス紹介セクション-->
    <div class="py-16 bg-gray-100 text-gray-800">
        <div class="max-w-5xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10">

            <!-- ロゴ画像 -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/store-pass_logo.png') }}" alt="Store-Passロゴ" class="w-48 h-48 rounded-xl">
            </div>

            <!-- 説明文 -->
            <div class="text-center md:text-left">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">ストパス（Store-Pass）</h2>

                <p class="text-lg sm:text-xl text-gray-600 mb-2 leading-relaxed">
                    お店に来れば来るほどお得になる<br>
                    加盟店全店舗で使えるアプリです。
                </p>
                <p class="text-lg text-gray-700 leading-relaxed mt-4">
                    月額500円のサブスクリプションを<br class="block sm:hidden">購入することで、<br>
                    店舗の垣根なくアプリ限定のサービスを<br class="block sm:hidden">受けられる仕組みとなっています。
                </p>
            </div>

        </div>
    </div>

<!-- アプリの主な機能紹介セクション-->
<div class="py-24 bg-white text-gray-800">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-16">アプリの主な機能</h2>

    <div class="grid sm:grid-cols-2 gap-10">

      <!-- 店舗一覧・詳細画面 -->
      <div class="bg-gray-100 p-8 rounded-2xl shadow-md border border-gray-200 flex flex-col justify-between items-center text-center transition-transform duration-300 hover:scale-105 sm:col-span-2">
        <div class="flex gap-4 mb-6 flex-wrap justify-center">
            <img src="{{ asset('images/tenpoitiran_1.png') }}" alt="店舗一覧1" class="w-72 h-72 object-contain">
            <img src="{{ asset('images/tenpoitiran_2.png') }}" alt="店舗一覧2" class="w-72 h-72 object-contain">
        </div>
        <h3 class="text-2xl font-bold mb-4 text-gray-900">店舗一覧・詳細画面</h3>
        <p class="text-base leading-relaxed text-gray-700 mb-3">アプリ加盟店が一覧で<br class="block sm:hidden">表示されます。<br class="block sm:hidden">会員様は店舗の垣根なく<br class="block sm:hidden">特典が利用でき、<br class="block sm:hidden">他店舗でも追加料金なしで<br class="block sm:hidden">アプリ限定特典を<br class="block sm:hidden">受けることができます。</p>
        <p class="text-base leading-relaxed text-gray-700">詳細画面には外部リンク、<br class="block sm:hidden">予約機能、SNS、レビューなどが<br class="block sm:hidden">充実しています。</p>
      </div>

      <!-- 会員特典画面 -->
      <div class="bg-gray-100 p-8 rounded-2xl shadow-md border border-gray-200 flex flex-col justify-between items-center text-center transition-transform duration-300 hover:scale-105">
        <img src="{{ asset('images/kaiintokuten.png') }}" alt="会員特典" class="w-64 h-64 object-contain mb-6">
        <h3 class="text-2xl font-bold mb-4 text-gray-900">会員特典画面</h3>
        <p class="text-base leading-relaxed text-gray-700 mb-3">選択店舗ごとの<br class="block sm:hidden">限定サービスが表示されます。<br>会員ランクに応じて<br class="block sm:hidden">特典もグレードアップ。</p>
        <p class="text-base leading-relaxed text-gray-700">初回特典は全店舗で<br class="block sm:hidden">1回ずつ利用可能。<br class="block sm:hidden">他にはない破格のサービスも。</p>
      </div>

      <!-- 会員証の画面 -->
      <div class="bg-gray-100 p-8 rounded-2xl shadow-md border border-gray-200 flex flex-col justify-between items-center text-center transition-transform duration-300 hover:scale-105">
        <img src="{{ asset('images/kaiinsyo.png') }}" alt="会員証" class="w-64 h-64 object-contain mb-6">
        <h3 class="text-2xl font-bold mb-4 text-gray-900">会員証の画面</h3>
        <p class="text-base leading-relaxed text-gray-700 mb-3">限定サービスを受けるには、<br class="block sm:hidden">こちらの会員証を提示するだけ。</p>
        <p class="text-base leading-relaxed text-gray-700">継続期間に応じて<br class="block sm:hidden">会員証のランクが上がり、<br>ブラック会員では驚きの特典も…！</p>
      </div>
    </div>
  </div>
</div>

    <!-- サブスクが使えるお店一覧 -->
    <div class="py-16 bg-gray-100 text-center text-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-semibold mb-6">ストパスが使えるお店</h3>
            <p class="text-lg mb-8 text-gray-700">以下の店舗でサブスクリプション特典を<br class="block sm:hidden">利用できます！</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($stores as $store)
                    @if ($store->delete_flg != 1)
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 text-gray-900">
                            <!-- 画像 -->
                            @if ($store->image)
                            <img src="{{ asset($store->image) }}" alt="{{ $store->name }}" class="object-cover rounded-lg mb-4">
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
                                        店舗詳細
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
<section class="bg-gradient-to-r from-gray-100 to-gray-300 text-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 flex flex-col lg:flex-row items-center justify-between gap-10">

        <!-- 左側：テキストエリア -->
        <div class="lg:w-1/2 w-full flex flex-col justify-center self-center text-center sm:text-left">
            <div class="pl-0 sm:pl-16">
                <h2 class="text-2xl sm:text-4xl font-bold mb-6 leading-snug">
                    利用すればするほど<br class="block sm:hidden">
                    <span class="sm:hidden">お得になる店舗アプリ</span>
                    <span class="hidden sm:inline">お得になる<br>店舗アプリ</span>
                </h2>

                <ul class="flex flex-col space-y-2 text-base sm:text-xl mb-8 text-gray-800 pl-12 sm:pl-0">
                    <li class="flex items-start">
                        <span class="text-teal-600 mr-2">✔︎</span>
                        <span>当日から使える限定特典</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-teal-600 mr-2">✔︎</span>
                        <span>サブスクリプションで使い放題</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-teal-600 mr-2">✔︎</span>
                        <span>店舗の情報を逃さずチェック</span>
                    </li>
                </ul>

                <!-- ダウンロードボタン -->
                <div class="flex flex-row justify-center sm:justify-start items-center space-x-4">
                    <!-- App Store -->
                    <a
                        href="https://apps.apple.com/jp/app/%E3%82%B9%E3%83%88%E3%83%91%E3%82%B9-store-pass/id6740623829"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/ja-jp?size=250x83"
                            alt="App Storeからダウンロード"
                            class="h-16 sm:h-20 transition-transform duration-300 hover:scale-105"
                        />
                    </a>

                    <!-- Google Play -->
                    <a
                        href="https://play.google.com/store/apps/details?id=com.obfall.yumepass&hl=ja"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            src="https://play.google.com/intl/ja/badges/static/images/badges/ja_badge_web_generic.png"
                            alt="Google Playで手に入れよう"
                            class="h-16 sm:h-24 transition-transform duration-300 hover:scale-105"
                        />
                    </a>
                </div>
            </div>
        </div>

        <!-- 右側：画像 -->
        <div class="lg:w-1/2 w-full flex justify-center mt-10 lg:mt-0">
            <img src="/images/store-pass_logo.png" alt="アプリ画面" class="w-64 sm:w-[360px] drop-shadow-xl rounded-xl">
        </div>
    </div>
</section>





@endsection
