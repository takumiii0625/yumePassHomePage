@extends('layouts.app')

@section('title', '利用規約')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">利用規約</h1>
        <p class="text-gray-700 leading-relaxed mb-6">この利用規約（以下、「本規約」といいます）は、夢パス（以下、「当社」といいます）が提供するサービス（以下、「本サービス」といいます）に関する利用条件を定めるものです。本サービスをご利用いただく前に、以下の内容をご確認いただき、同意の上でご利用ください。</p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">第1条（適用）</h2>
        <p class="text-gray-700 mb-6">本規約は、ユーザー（以下、「利用者」といいます）が本サービスを利用するにあたり適用されます。</p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">第2条（禁止事項）</h2>
        <ul class="list-disc pl-6 text-gray-700 mb-6">
            <li>法令に違反する行為</li>
            <li>他の利用者に対する嫌がらせ行為</li>
            <li>当社のサーバーやシステムに不正アクセスする行為</li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">第3条（免責）</h2>
        <p class="text-gray-700 mb-6">当社は、本サービスの提供において、利用者に対して一切の責任を負いません。</p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">第4条（変更・停止）</h2>
        <p class="text-gray-700 mb-6">当社は、予告なく本サービスを変更または停止することがあります。</p>
    </div>
@endsection
