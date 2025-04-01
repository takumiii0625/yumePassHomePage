<p>新しいお問い合わせを受け付けました。</p>

<hr>
<p><strong>お名前：</strong> {{ $contact['name'] }}</p>
<p><strong>メールアドレス：</strong> {{ $contact['email'] }}</p>
<p><strong>お問い合わせ内容：</strong><br>{!! nl2br(e($contact['contact'])) !!}</p>
<hr>

<p>OBFall管理システム</p>
