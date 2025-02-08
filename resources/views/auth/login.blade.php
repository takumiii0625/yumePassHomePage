<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-xl mt-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">ログイン</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('メールアドレス')" class="text-sm text-gray-600" />
                <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" class="text-sm text-gray-600" />
                <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 transition duration-200"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2">{{ __('ログイン状態を保持する') }}</span>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between mt-6">
                <!-- Forgot Password Link -->
                <div>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                            {{ __('パスワードを忘れた方') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <x-primary-button class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                        {{ __('ログイン') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        <!-- Sign Up Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                {{ __('まだアカウントをお持ちでないですか？') }}
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800">
                    {{ __('新規登録') }}
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
