@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-6">お知らせの更新が完了しました</h1>

<div class="bg-white p-6 rounded-lg shadow-md text-center">
    <p class="text-lg text-gray-700">「<strong>{{ $news->title }}</strong>」の情報を更新しました。</p>

    <!-- お知らせ一覧に戻るボタン -->
    <div class="mt-6">
        <a href="{{ route('adminIndex') }}" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">
            お知らせ一覧に戻る
        </a>
    </div>
</div>
@endsection
