@extends('layouts.app')

@section('title', 'ストパス（Store-Pass）')

@section('content')

    <!-- ヒーローセクション -->
    <div class="relative overflow-hidden hero-rainbow py-20 sm:py-28">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.15\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"4\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
        <!-- 浮遊する装飾 -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/20 rounded-full blur-xl animate-float"></div>
        <div class="absolute top-40 right-20 w-32 h-32 bg-white/10 rounded-full blur-2xl animate-float-delay"></div>
        <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white/20 rounded-full blur-lg animate-float"></div>
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12 relative z-10">

            <!-- ロゴ画像 -->
            <div class="flex-shrink-0 animate-bounce-slow">
                <img src="{{ asset('images/store-pass_logo.png') }}" alt="Store-Passロゴ" class="w-40 h-40 sm:w-56 sm:h-56 rounded-3xl shadow-2xl ring-4 ring-white/30 transform hover:scale-105 transition-transform duration-300">
            </div>

            <!-- 説明文 -->
            <div class="text-center md:text-left">
                <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm font-medium mb-4 animate-pulse">
                    飲食店特化アプリ
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                    ストパス<span class="text-yellow-300">.</span>
                </h1>
                <p class="text-xl sm:text-2xl text-white/90 mb-4 leading-relaxed font-medium">
                    お店に来れば来るほどお得になる<br class="sm:hidden">
                    <span class="text-yellow-200">加盟店全店舗</span>で使えるアプリ
                </p>
                <p class="text-lg text-white/80 leading-relaxed">
                    店舗の垣根なくアプリ限定のサービスを<br class="sm:hidden">
                    受けられる新しいグルメ体験
                </p>

                <!-- CTAボタン -->
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-8">
                    <a href="https://apps.apple.com/jp/app/%E3%82%B9%E3%83%88%E3%83%91%E3%82%B9-store-pass/id6740623829" target="_blank" class="inline-flex items-center gap-2 bg-white text-orange-600 font-bold px-6 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/></svg>
                        App Store
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.obfall.yumepass&hl=ja" target="_blank" class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white font-bold px-6 py-3 rounded-full border-2 border-white/50 hover:bg-white hover:text-orange-600 transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/></svg>
                        Google Play
                    </a>
                </div>
            </div>

        </div>

        <!-- 装飾的な波形 -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </div>

<!-- 提携店舗-->
<div class="py-20 partner-section relative overflow-hidden">
    <!-- 背景装飾 -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-gradient-to-br from-yellow-300/20 to-transparent rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-tl from-cyan-300/20 to-transparent rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-32 bg-gradient-to-r from-transparent via-purple-200/30 to-transparent"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="text-center mb-12">
            <span class="inline-block px-5 py-2 rainbow-gradient text-white rounded-full text-sm font-bold mb-4 shadow-lg">PARTNER STORES</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 mb-2">
                提携店舗
            </h2>
            <p class="text-gray-500 mt-4 text-lg">厳選されたグルメスポットが続々参加中</p>
        </div>

        <div class="">

            {{-- ▼ 流れるリスト --}}
            <div class="marquee py-4">
                <div class="marquee__track">
                    {{-- 1周目 --}}
                    @foreach ($stores as $store)
                    @if ($store->delete_flg != 1)
                    <div class="marquee__item group">
                        <div class="store-card relative p-1 rounded-3xl transition-all duration-500">
                            <div class="bg-white rounded-3xl overflow-hidden shadow-xl">
                                @if ($store->image)
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($store->image) }}" alt="{{ $store->name }}" class="marquee__img group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        <span class="inline-block px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-gray-800">VIEW</span>
                                    </div>
                                </div>
                                @else
                                <div class="marquee__img flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-50 to-gray-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                @endif
                                <div class="p-4 text-center">
                                    <h4 class="text-sm sm:text-base font-black text-gray-800 truncate group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all duration-300">
                                        {{ $store->name }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    {{-- 2周目（シームレスにするため複製） --}}
                    @foreach ($stores as $store)
                    @if ($store->delete_flg != 1)
                    <div class="marquee__item group">
                        <div class="store-card relative p-1 rounded-3xl transition-all duration-500">
                            <div class="bg-white rounded-3xl overflow-hidden shadow-xl">
                                @if ($store->image)
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($store->image) }}" alt="{{ $store->name }}" class="marquee__img group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        <span class="inline-block px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-gray-800">VIEW</span>
                                    </div>
                                </div>
                                @else
                                <div class="marquee__img flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-50 to-gray-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                @endif
                                <div class="p-4 text-center">
                                    <h4 class="text-sm sm:text-base font-black text-gray-800 truncate group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all duration-300">
                                        {{ $store->name }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</div>

<!-- アプリの主な機能紹介セクション-->
<div class="py-20 bg-gradient-to-b from-white to-orange-50 text-gray-800">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-red-100 to-orange-100 text-red-700 rounded-full text-sm font-bold mb-4">FEATURES</span>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">アプリの主な機能</h2>
        <p class="text-gray-500 mt-4">シンプルで使いやすい、あなたのグルメライフをサポート</p>
    </div>

    <div class="grid sm:grid-cols-2 gap-8">

      <!-- 店舗一覧・詳細画面 -->
      <div class="relative bg-white p-8 rounded-3xl shadow-xl border border-orange-100 flex flex-col justify-between items-center text-center sm:col-span-2 overflow-hidden group hover:shadow-2xl transition-all duration-500">
        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-orange-200/50 to-transparent rounded-bl-full"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-gradient-to-tr from-red-200/30 to-transparent rounded-full blur-2xl"></div>
        <div class="flex gap-6 mb-8 flex-wrap justify-center relative z-10">
            <img src="{{ asset('images/tenpoitiran_1.png') }}" alt="店舗一覧1" class="w-56 sm:w-72 h-auto object-contain rounded-2xl shadow-lg transform hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('images/tenpoitiran_2.png') }}" alt="店舗一覧2" class="w-56 sm:w-72 h-auto object-contain rounded-2xl shadow-lg transform hover:scale-105 transition-transform duration-300">
        </div>
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-xs font-bold mb-3">MAIN FEATURE</span>
            <h3 class="text-2xl sm:text-3xl font-black mb-4 text-gray-900">店舗一覧・詳細画面</h3>
            <p class="text-base leading-relaxed text-gray-600 mb-3 max-w-2xl">アプリ加盟店が一覧で表示されます。<span class="text-orange-600 font-semibold">会員様は店舗の垣根なく特典が利用でき</span>、他店舗でも追加料金なしでアプリ限定特典を受けることができます。</p>
            <p class="text-base leading-relaxed text-gray-600 max-w-2xl">詳細画面には外部リンク、予約機能、SNS、レビューなどが充実しています。</p>
        </div>
      </div>

      <!-- 会員特典画面 -->
      <div class="relative bg-white p-8 rounded-3xl shadow-xl border border-red-100 flex flex-col justify-between items-center text-center overflow-hidden group hover:shadow-2xl transition-all duration-500">
        <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-red-200/50 to-transparent rounded-br-full"></div>
        <div class="relative z-10">
            <img src="{{ asset('images/kaiintokuten.png') }}" alt="会員特典" class="w-52 sm:w-64 h-auto object-contain mb-6 drop-shadow-xl transform group-hover:scale-105 transition-transform duration-300">
            <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold mb-3">BENEFITS</span>
            <h3 class="text-2xl font-black mb-4 text-gray-900">会員特典画面</h3>
            <p class="text-base leading-relaxed text-gray-600 mb-3">選択店舗ごとの限定サービスが表示されます。<span class="text-red-700 font-semibold">会員ランクに応じて特典もグレードアップ。</span></p>
            <p class="text-base leading-relaxed text-gray-600">初回特典は全店舗で1回ずつ利用可能。他にはない破格のサービスも。</p>
        </div>
      </div>

      <!-- 会員証の画面 -->
      <div class="relative bg-white p-8 rounded-3xl shadow-xl border border-yellow-100 flex flex-col justify-between items-center text-center overflow-hidden group hover:shadow-2xl transition-all duration-500">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-200/50 to-transparent rounded-bl-full"></div>
        <div class="relative z-10">
            <img src="{{ asset('images/kaiinsyo.png') }}" alt="会員証" class="w-52 sm:w-64 h-auto object-contain mb-6 drop-shadow-xl transform group-hover:scale-105 transition-transform duration-300">
            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold mb-3">MEMBERSHIP</span>
            <h3 class="text-2xl font-black mb-4 text-gray-900">会員証の画面</h3>
            <p class="text-base leading-relaxed text-gray-600 mb-3">限定サービスを受けるには、こちらの会員証を提示するだけ。</p>
            <p class="text-base leading-relaxed text-gray-600">継続期間に応じて会員証のランクが上がり、<span class="text-yellow-600 font-semibold">ブラック会員では驚きの特典も…！</span></p>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- お店一覧 -->
    <div class="py-20 bg-gradient-to-b from-orange-50 to-white text-center text-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-red-100 to-orange-100 text-red-600 rounded-full text-sm font-bold mb-4">STORE LIST</span>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">ストパスが使えるお店</h3>
                <p class="text-gray-500 mt-4">以下の店舗でアプリ限定特典を利用できます</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($stores as $store)
                    @if ($store->delete_flg != 1)
                        <div class="group bg-white p-6 rounded-3xl shadow-lg border border-gray-100 text-gray-900 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-full h-1 rainbow-gradient transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                            <!-- 画像 -->
                            @if ($store->image)
                            <div class="relative overflow-hidden rounded-2xl mb-4">
                                <img src="{{ asset($store->image) }}" alt="{{ $store->name }}" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center text-gray-400 mb-4">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                                <!-- 店舗名 -->
                                <h4 class="text-lg sm:text-xl font-black text-gray-900 group-hover:text-orange-600 transition-colors">{{ $store->name }}</h4>
                                <!-- 郵便番号 -->
                                <p class="text-gray-500 mt-2 text-sm flex items-center justify-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    〒{{ $store->zip1 }}-{{ $store->zip2 }}
                                </p>
                                <!-- 住所 -->
                                <p class="text-gray-600 text-sm">{{ $store->address }}</p>

                            <!-- 建物名 (あれば表示) -->
                            @if ($store->build)
                                <p class="text-gray-500 text-sm">{{ $store->build }}</p>
                            @endif
                            <!-- URL -->
                            @if ($store->url)
                                <p class="mt-4">
                                    <a href="{{ $store->url }}" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-5 py-2 rounded-full text-sm font-bold hover:from-orange-600 hover:to-red-600 transform hover:scale-105 transition-all duration-300 shadow-md hover:shadow-lg">
                                        店舗詳細
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @if(isset($voices) && $voices->count())
    <div class="py-20 bg-white text-center text-gray-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-teal-100 to-cyan-100 text-teal-600 rounded-full text-sm font-bold mb-4">VOICE</span>
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">店舗からの声</h3>
            <p class="text-gray-500 mt-4">実際にご協力いただいた店舗さまのインタビューを掲載しています</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
        @foreach($voices as $voice)
            <div class="group bg-white p-6 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-400 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

            @if(!empty($voice->image))
            <div class="relative overflow-hidden rounded-2xl mb-4">
                <img src="{{ asset($voice->image) }}" alt="{{ $voice->title }}" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            @endif

            <p class="text-xs text-gray-400 mb-2 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $voice->published_at ? \Carbon\Carbon::parse($voice->published_at)->format('Y.m.d') : '' }}
                @if($voice->store) <span class="text-teal-600 font-medium">{{ $voice->store->name }}</span> @endif
            </p>

            <h4 class="text-lg font-black text-gray-900 mb-3 group-hover:text-teal-600 transition-colors">
                {{ $voice->title ?? '店舗インタビュー' }}
            </h4>

            <p class="text-gray-600 leading-relaxed text-sm">
                {{ $voice->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($voice->body), 90) }}
            </p>

            <a href="{{ route('storeVoiceShow', $voice->id) }}"
                class="inline-flex items-center gap-2 mt-4 text-teal-600 font-bold hover:text-teal-700 transition-colors">
                続きを読む
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            </div>
        @endforeach
        </div>
    </div>
    </div>
    @endif


<!-- CTAセクション -->
<section class="relative cta-rainbow text-white py-24 overflow-hidden">
    <!-- 背景デコレーション -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-400/30 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/30 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute top-1/2 right-10 w-64 h-64 bg-yellow-400/20 rounded-full blur-2xl animate-float"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 flex flex-col lg:flex-row items-center justify-between gap-12 relative z-10">

        <!-- 左側：テキストエリア -->
        <div class="lg:w-1/2 w-full flex flex-col justify-center self-center text-center lg:text-left">
            <div>
                <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/20">
                    今すぐダウンロード
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mb-8 leading-tight">
                    利用すればするほど<br>
                    <span class="text-gradient-rainbow">お得になる</span><br>
                    店舗アプリ
                </h2>

                <ul class="flex flex-col space-y-4 text-base sm:text-lg mb-10 text-gray-300">
                    <li class="flex items-center justify-center lg:justify-start gap-3">
                        <span class="flex items-center justify-center w-8 h-8 check-rainbow rounded-full text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span>当日から使える限定特典</span>
                    </li>
                    <li class="flex items-center justify-center lg:justify-start gap-3">
                        <span class="flex items-center justify-center w-8 h-8 check-rainbow rounded-full text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span>加盟店全店舗で特典利用可能</span>
                    </li>
                    <li class="flex items-center justify-center lg:justify-start gap-3">
                        <span class="flex items-center justify-center w-8 h-8 check-rainbow rounded-full text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span>店舗の情報を逃さずチェック</span>
                    </li>
                </ul>

                <!-- ダウンロードボタン -->
                <div class="flex flex-wrap justify-center lg:justify-start items-center gap-4">
                    <!-- App Store -->
                    <a
                        href="https://apps.apple.com/jp/app/%E3%82%B9%E3%83%88%E3%83%91%E3%82%B9-store-pass/id6740623829"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="transform hover:scale-105 transition-transform duration-300"
                    >
                        <img
                            src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/ja-jp?size=250x83"
                            alt="App Storeからダウンロード"
                            class="h-14 sm:h-16 rounded-lg"
                        />
                    </a>

                    <!-- Google Play -->
                    <a
                        href="https://play.google.com/store/apps/details?id=com.obfall.yumepass&hl=ja"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="transform hover:scale-105 transition-transform duration-300"
                    >
                        <img
                            src="https://play.google.com/intl/ja/badges/static/images/badges/ja_badge_web_generic.png"
                            alt="Google Playで手に入れよう"
                            class="h-14 sm:h-[68px]"
                        />
                    </a>
                </div>
            </div>
        </div>

        <!-- 右側：画像 -->
        <div class="lg:w-1/2 w-full flex justify-center">
            <div class="relative">
                <div class="absolute inset-0 rainbow-glow rounded-3xl blur-2xl opacity-40 scale-110"></div>
                <img src="/images/iphone立体画像.jpg" alt="アプリ画面" class="relative w-64 sm:w-80 lg:w-[380px] drop-shadow-2xl rounded-3xl ring-1 ring-white/20">
            </div>
        </div>
    </div>
</section>





@endsection

@push('styles')
<style>
    /* 虹色グラデーション */
    .hero-rainbow {
        background: linear-gradient(135deg,
            #ff6b6b 0%,
            #feca57 20%,
            #48dbfb 40%,
            #ff9ff3 60%,
            #54a0ff 80%,
            #5f27cd 100%);
        background-size: 400% 400%;
        animation: gradient-shift 8s ease infinite;
    }

    .cta-rainbow {
        background: linear-gradient(135deg,
            #1a1a2e 0%,
            #16213e 50%,
            #0f3460 100%);
    }

    .rainbow-gradient {
        background: linear-gradient(90deg,
            #ff6b6b, #feca57, #48dbfb, #ff9ff3, #54a0ff, #5f27cd);
        background-size: 200% 200%;
        animation: gradient-shift 3s ease infinite;
    }

    .rainbow-glow {
        background: linear-gradient(135deg,
            #ff6b6b 0%,
            #feca57 25%,
            #48dbfb 50%,
            #ff9ff3 75%,
            #54a0ff 100%);
    }

    .check-rainbow {
        background: linear-gradient(135deg, #ff6b6b, #feca57, #48dbfb);
        background-size: 200% 200%;
        animation: gradient-shift 2s ease infinite;
    }

    .text-gradient-rainbow {
        background: linear-gradient(90deg, #ff6b6b, #feca57, #48dbfb, #ff9ff3, #54a0ff);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 浮遊アニメーション */
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    @keyframes float-delay {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(-5deg); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-delay {
        animation: float-delay 8s ease-in-out infinite;
    }

    .animate-pulse-slow {
        animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* カスタムアニメーション */
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .animate-bounce-slow {
        animation: bounce-slow 3s ease-in-out infinite;
    }

    /* 調整しやすいようにCSS変数で管理 */
    :root {
        --marquee-gap: 1.5rem;
        --marquee-item-w: clamp(180px, 22vw, 260px);
        --marquee-img-h: 180px;
        --marquee-duration: 20s;
    }

    /* タブレット以下 */
    @media (max-width: 768px) {
        :root {
            --marquee-gap: 1.25rem;
            --marquee-item-w: 42vw;
            --marquee-img-h: 140px;
            --marquee-duration: 16s;
        }
    }

    /* スマホ */
    @media (max-width: 480px) {
        :root {
            --marquee-gap: 1rem;
            --marquee-item-w: 45vw;
            --marquee-img-h: 120px;
            --marquee-duration: 12s;
        }
    }

    .marquee {
        overflow: hidden;
        padding: 1rem 0;
    }

    .marquee__track {
        display: flex;
        gap: var(--marquee-gap);
        width: max-content;
        animation: marquee var(--marquee-duration) linear infinite;
    }

    .marquee:hover .marquee__track {
        animation-play-state: paused;
    }

    .marquee__item {
        flex: 0 0 var(--marquee-item-w);
        width: var(--marquee-item-w);
    }

    .marquee__img {
        width: 100%;
        height: var(--marquee-img-h);
        object-fit: cover;
        object-position: center;
        border-radius: 1rem;
    }

    @keyframes marquee {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    @media (prefers-reduced-motion: reduce) {
        .marquee__track, .hero-rainbow, .rainbow-gradient, .check-rainbow, .text-gradient-rainbow {
            animation: none;
        }
    }

    /* スムーススクロール */
    html {
        scroll-behavior: smooth;
    }

    /* カードホバーエフェクト */
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    /* 提携店舗セクション */
    .partner-section {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
    }

    /* 店舗カード */
    .store-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
        backdrop-filter: blur(10px);
    }

    .store-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 1.5rem;
        padding: 2px;
        background: linear-gradient(135deg, #e2e8f0, #f1f5f9);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        transition: all 0.5s ease;
    }

    .group:hover .store-card::before {
        background: linear-gradient(135deg, #ff6b6b, #feca57, #48dbfb, #ff9ff3, #54a0ff, #5f27cd);
        background-size: 300% 300%;
        animation: gradient-shift 2s ease infinite;
    }

    .group:hover .store-card {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush