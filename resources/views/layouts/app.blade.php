<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>夢パス - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- ヘッダー -->
    <header class="fixed top-0 left-0 w-full bg-white text-black py-6 shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- ロゴ -->
            <h1 class="text-4xl font-extrabold">夢パス</h1>
            <!-- ナビゲーション -->
            <nav>
                <ul class="flex space-x-8 text-lg">
                    <li><a href="{{ url('/') }}" class="text-black transition duration-300">トップページ</a></li>
                    <li><a href="{{ url('/about') }}" class="text-black transition duration-300">会社概要</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-black transition duration-300">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="mt-24 container mx-auto px-4 py-8"> <!-- ヘッダー分のパディングを追加 -->
        <!-- サクセスメッセージ -->
        @if (session('success'))
        <div class="bg-green-200 text-green-800 p-6 rounded-lg mb-8 shadow-lg transform transition duration-300 hover:scale-105">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white py-6 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="mb-4 text-lg">夢パス - あなたの食生活をサポートします。</p>
            <nav>
                <ul class="flex justify-center space-x-8 text-lg">
                    <li><a href="{{ url('/terms') }}" class="hover:text-gray-400 transition duration-300">利用規約</a></li>
                    <li><a href="{{ url('/privacy') }}" class="hover:text-gray-400 transition duration-300">プライバシーポリシー</a></li>
                    <li><a href="{{ url('/legal') }}" class="hover:text-gray-400 transition duration-300">特商法取引</a></li>
                </ul>
            </nav>
            <p class="text-gray-400 text-sm mt-4">© 2025 夢パス. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>
