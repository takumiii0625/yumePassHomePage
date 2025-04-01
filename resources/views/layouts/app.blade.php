<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ストパス（Store-Pass）</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- ヘッダー -->
    <header class="sticky top-0 left-0 w-full bg-white text-black py-4 shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">

            <!-- ロゴ（画像＋テキスト） -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2 hover:text-gray-600 transition duration-300">
                <img src="{{ asset('images/store-pass_logo.png') }}" alt="Store-Pass ロゴ" class="w-10 h-10 object-contain">
                <span class="text-2xl sm:text-4xl font-extrabold">
                    ストパス（Store-Pass）
                </span>
            </a>

            <!-- ハンバーガーメニュー（スマホ用） -->
            <button id="menu-toggle" class="sm:hidden text-3xl focus:outline-none">
                ☰
            </button>

            <!-- ナビゲーション -->
            <nav id="menu" class="hidden sm:flex space-x-8 text-lg">
                <ul class="flex flex-col sm:flex-row sm:space-x-8 text-lg sm:items-center">
                    <li><a href="{{ url('/news') }}" class="text-black hover:text-gray-600 transition duration-300">お知らせ</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-black hover:text-gray-600 transition duration-300">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>

        <!-- スマホ用メニュー -->
        <nav id="mobile-menu" class="hidden bg-white shadow-lg">
            <ul class="flex flex-col items-center space-y-4 py-4">
                <li><a href="{{ url('/news') }}" class="text-black hover:text-gray-600 transition duration-300">お知らせ</a></li>
                <li><a href="{{ url('/contact') }}" class="text-black hover:text-gray-600 transition duration-300">お問い合わせ</a></li>
            </ul>
        </nav>
    </header>

    <!-- メインコンテンツ -->
    <main class="container mx-auto px-4 pt-20 sm:pt-32">
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
            <!-- ナビゲーション -->
            <nav>
                <ul class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-lg">
                    <li>
                        <a href="https://obfall.com" target="_blank" rel="noopener noreferrer" class="hover:text-gray-400 transition duration-300">
                            会社概要
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user-agreement') }}" target="_blank" rel="noopener noreferrer" class="hover:text-gray-400 transition duration-300">
                            利用規約
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/privacypolicy') }}" target="_blank" rel="noopener noreferrer" class="hover:text-gray-400 transition duration-300">
                            プライバシーポリシー
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tokuteisyoutorihiki') }}" target="_blank" rel="noopener noreferrer" class="hover:text-gray-400 transition duration-300">
                            特商法取引
                        </a>
                    </li>
                </ul>
            </nav>

            <p class="text-gray-400 text-sm mt-4">Copyright © OBFall Co.LTD. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- ハンバーガーメニューのJS -->
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>

</body>

</html>
