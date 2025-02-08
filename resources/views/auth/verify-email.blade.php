<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-xl mt-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">メール認証</h2>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('ご登録ありがとうございます！まずは、メールアドレスを確認するために、送信したリンクをクリックしてください。メールが届いていない場合は、再送信できますのでお知らせください。') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('新しい認証リンクがご登録のメールアドレスに送信されました。') }}
            </div>
        @endif

        <div class="mt-6 flex items-center justify-between">
            <!-- Resend Verification Email -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                        {{ __('認証メールを再送信') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Log Out -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </div>
    </div
