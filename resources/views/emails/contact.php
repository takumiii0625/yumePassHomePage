<!-- resources/views/emails/contact.blade.php -->

<h1>新しいお問い合わせ</h1>

<p><strong>名前：</strong> {{ $data['name'] }}</p>
<p><strong>メールアドレス：</strong> {{ $data['email'] }}</p>
<p><strong>メッセージ：</strong></p>
<p>{{ $data['message'] }}</p>
