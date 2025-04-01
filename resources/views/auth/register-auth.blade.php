<x-guest-layout>
    <div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
        <h2 class="text-2xl mb-4 text-center">登録ページへのアクセス</h2>

        @if($errors->any())
            <div class="mb-4 text-red-600">{{ $errors->first('access_password') }}</div>
        @endif

        <form method="POST" action="{{ route('register.auth') }}">
            @csrf
            <label for="access_password" class="block text-sm text-gray-700 mb-2">アクセスパスワード</label>
            <input id="access_password" name="access_password" type="password" class="w-full p-2 border border-gray-300 rounded" required>

            <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                確認
            </button>
        </form>
    </div>
</x-guest-layout>
