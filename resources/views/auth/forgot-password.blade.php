<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('パスワードをお忘れですか？問題ありません。メールアドレスをお知らせいただければ、パスワードリセットリンクをお送りいたします。新しいパスワードを選択できるようになります。') }}
    </div>

    <!-- セッションステータス -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl mt-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">パスワードリセット</h2>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- メールアドレス -->
            <div>
                <x-input-label for="email" :value="__('メールアドレス')" class="text-sm text-gray-600" />
                <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- ボタン -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                    {{ __('パスワードリセットリンクを送信') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
