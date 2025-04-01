@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 bg-gray-200 border-b rounded-t-lg">
                <h2 class="text-xl font-semibold">お問い合わせ</h2>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('confirm') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">お名前</label>
                        <div class="mt-1">
                            <input id="name" type="text" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                        <div class="mt-1">
                            <input id="email" type="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" autofocus>
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="contact" class="block text-sm font-medium text-gray-700">お問い合わせ内容</label>
                        <div class="mt-1">
                            <textarea id="contact" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('contact') border-red-500 @enderror" name="contact" cols="30" rows="5">{{ old('contact') }}</textarea>
                        </div>
                        @error('contact')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold text-lg rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            お問い合わせ内容の確認へ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
