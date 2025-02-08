<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-xl mt-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">パスワード確認</h2>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('これはアプリケーションのセキュアなエリアです。続行する前にパスワードを確認してください。') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('パスワード')" class="text-sm text-gray-600" />

                <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                    {{ __('確認する') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
