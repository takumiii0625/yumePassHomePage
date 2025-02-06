@extends('layouts.app')

@section('title', 'コンタクトフォーム')

@section('content')
    <h1>お問い合わせ</h1>

    <!-- 成功メッセージ表示 -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- 送信先を設定 -->
    <form method="POST" action="{{ url('/contact') }}">
        <!-- CSRFトークンを設定（セキュリティ対策） -->
        @csrf

        <!-- 名前入力フィールド -->
        <div>
            <label for="name">名前：</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- メールアドレス入力フィールド -->
        <div>
            <label for="email">メールアドレス：</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- メッセージ入力エリア -->
        <div>
            <label for="message">メッセージ：</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <!-- 送信ボタン -->
        <div>
            <button type="submit">送信</button>
        </div>
    </form>
@endsection
