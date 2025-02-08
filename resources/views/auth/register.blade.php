<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-xl mt-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">新規登録</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('名前')" class="text-sm text-gray-600" />
                <x-text-input id="name" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('メールアドレス')" class="text-sm text-gray-600" />
                <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" class="text-sm text-gray-600" />
                <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('パスワード確認')" class="text-sm text-gray-600" />
                <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                <!-- Login Link -->
                <div>
                    <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('login') }}">
                        {{ __('すでにアカウントをお持ちですか？') }}
                    </a>
                </div>

                <!-- Register Button -->
                <div>
                    <x-primary-button class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                        {{ __('登録') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
