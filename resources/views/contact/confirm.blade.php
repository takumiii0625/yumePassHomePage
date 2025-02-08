@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 bg-gray-200 border-b rounded-t-lg">
                <h2 class="text-xl font-semibold">お問い合わせ内容確認</h2>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('send') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    <input type="hidden" name="contact" value="{{ $contact['contact'] }}">

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス:</label>
                        <div class="mt-1 text-gray-900">
                            {{ $contact['email'] }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="contact" class="block text-sm font-medium text-gray-700">お問い合わせ内容:</label>
                        <div class="mt-1 text-gray-900">
                            {{ $contact['contact'] }}
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <div>
                            <a href="{{ route('index') }}" class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold text-lg rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                < 戻る
                            </a>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold text-lg rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                送信 >
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
