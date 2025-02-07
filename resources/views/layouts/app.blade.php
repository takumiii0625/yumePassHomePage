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
    <header class="bg-green-500 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-3xl font-extrabold">夢パス</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ url('/') }}" class="hover:text-gray-200">トップページ</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-gray-200">会社概要</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-gray-200">コンタクトフォーム</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="container mx-auto px-4 py-8">
        <!-- サクセスメッセージ -->
        @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-8">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white py-4 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="mb-4">夢パス - あなたの食生活をサポートします。</p>
            <nav>
                <ul class="flex justify-center space-x-6">
                    <li><a href="{{ url('/') }}" class="hover:text-gray-400">トップページ</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-gray-400">会社概要</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-gray-400">コンタクトフォーム</a></li>
                </ul>
            </nav>
            <p class="text-gray-400 text-sm mt-4">© 2025 夢パス. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>