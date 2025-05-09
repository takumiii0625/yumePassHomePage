<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>ストパス（Store-Pass） - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- ヘッダー -->
    <header class="fixed top-0 left-0 w-full bg-white text-black py-6 shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- ロゴ -->
            <h1 class="text-4xl font-extrabold">管理者画面</h1>
            <!-- ログアウトボタン -->
            <nav>
                <ul class="flex space-x-8 text-lg">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-black transition duration-300">
                                ログアウト
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="container mx-auto px-4 pt-32" style="padding-top: 8rem !important;"> <!-- ヘッダー分のパディングを追加 -->
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
            <nav>
                <ul class="flex justify-center space-x-8 text-lg">
                    <li><a href="{{ url('/user-agreement') }}" class="hover:text-gray-400 transition duration-300">利用規約</a></li>
                    <li><a href="{{ url('/privacypolicy') }}" class="hover:text-gray-400 transition duration-300">プライバシーポリシー</a></li>
                    <li><a href="{{ url('/tokuteisyoutorihiki') }}" class="hover:text-gray-400 transition duration-300">特商法取引</a></li>
                </ul>
            </nav>
            <p class="text-gray-400 text-sm mt-4">Copyright © OBFall Co.LTD. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    @yield('scripts')

</body>

</html>
