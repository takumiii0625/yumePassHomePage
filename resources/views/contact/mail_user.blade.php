<p>{{ $contact['name'] }} 様</p>

<p>この度はお問い合わせいただき、誠にありがとうございます。</p>
<p>以下の内容でお問い合わせを受け付けました。</p>

<hr>
<p><strong>お名前：</strong> {{ $contact['name'] }}</p>
<p><strong>メールアドレス：</strong> {{ $contact['email'] }}</p>
<p><strong>お問い合わせ内容：</strong><br>{!! nl2br(e($contact['contact'])) !!}</p>
<hr>

<p>担当者より順次ご連絡させていただきますので、今しばらくお待ちください。</p>

<p>-----------------------------------------<br>
OBFall株式会社<br>
ストパス（Store-Pass）カスタマーサポート<br>
〒105-0022<br>
東京都港区海岸1-2-3<br>
汐留芝離宮ビルディング 21F<br>
TEL: 03-5403-5904<br>
Email: store-pass@obfall.co.jp<br>
URL: <a href="https://obfall.com" target="_blank">https://obfall.com</a><br>
-----------------------------------------</p>
