@extends('layouts.app')

@section('title', 'プライバシーポリシー')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">プライバシーポリシー</h1>
        <p class="text-gray-700 leading-relaxed mb-6">夢パス（以下、「当社」といいます）は、個人情報の保護に関する法令を遵守し、利用者の個人情報を適切に取り扱います。本ポリシーは、当社が収集する個人情報とその利用方法について説明します。</p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">1. 収集する情報</h2>
        <p class="text-gray-700 mb-6">当社は、サービス提供に必要な範囲で、利用者の以下の情報を収集します：</p>
        <ul class="list-disc pl-6 text-gray-700 mb-6">
            <li>氏名、メールアドレス、電話番号</li>
            <li>利用者のIPアドレス、ブラウザの種類、アクセス日時</li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">2. 情報の利用目的</h2>
        <p class="text-gray-700 mb-6">収集した情報は、以下の目的で使用されます：</p>
        <ul class="list-disc pl-6 text-gray-700 mb-6">
            <li>サービスの提供及び改善</li>
            <li>お問い合わせ対応</li>
            <li>マーケティング及び広告配信</li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">3. 情報の第三者提供</h2>
        <p class="text-gray-700 mb-6">当社は、法令に基づく場合を除き、利用者の個人情報を第三者に提供することはありません。</p>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">4. セキュリティ</h2>
        <p class="text-gray-700 mb-6">当社は、利用者の個人情報を安全に管理し、不正アクセスや漏洩を防止するための適切な措置を講じています。</p>
    </div>
@endsection
