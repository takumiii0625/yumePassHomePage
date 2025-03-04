@extends('layouts.app')

@section('title', '特定商取引法に基づく表記')

@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>特定商取引法に基づく表示</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* 画面の両サイドに20%の余白を追加 */
        .content-container {
            margin-left: 5%;
            margin-right: 5%;
        }

        body {
            font-size: 2vw;
            /* ビューポートの幅の2%に基づいたフォントサイズ */
        }

        h1 {
            font-size: 4vw;
            /* h1はより大きく設定 */
            margin-top: 20px;
            text-align: center;
            /* テキストを中央揃え */
        }

        p {
            font-size: 2vw;
            /* 段落のフォントサイズ */
            line-height: 1.6;
            /* 行間を広めにして読みやすく */
            margin: 5px 0;
            /* 段落間に余白を追加 */
        }

        ol {
            list-style-position: outside;
            /* 数字を外側に配置 */
            margin-left: 10px;
            /* リスト全体を少し内側に */
        }

        li {
            margin-bottom: 20px;
            /* 各リストアイテムの間に余白を追加 */
        }

        p:first-of-type {
            margin-top: 20px;
            /* 最初の段落の上に余白を追加 */
        }

        .title {
            padding-left: 40px;
        }

        /* 画面サイズが大きいときのフォントサイズ */
        @media (min-width: 1024px) {
            body {
                font-size: 18px;
                /* デスクトップでは通常サイズに戻す */
            }

            h1 {
                font-size: 36px;
            }

            p {
                font-size: 18px;
            }
        }

        /* 画面サイズが小さいときのフォントサイズ */
        @media (max-width: 600px) {
            body {
                font-size: 3.5vw;
                /* 小さな画面ではフォントを少し大きめに */
            }

            h1 {
                font-size: 6vw;
            }

            p {
                font-size: 3.5vw;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="content-container">
        <h1>特定商取引法に基づく表示</h1>

        <p class=title>　OBFall株式会社が提供する店舗パス（以下、「本アプリ」といいます。）の有償サブスクリプションサービスに関する特定商取引法に基づく表示は以下のとおりです。</p>

        <ol>
            <li>
                <p>販売価格</p>
                <p>月額500円（消費税込み）</p>
            </li>
            <li>
                <p>代金の支払時期、方法</p>
                <p>支払時期：本アプリにおいて購入手続を行った後</p>
                <p>支払方法：Apple、Googleが提供する決済手段</p>
            </li>
            <li>
                <p>サービスの提供時期</p>
                <p>購入手続完了直後</p>
            </li>

            <li>
                <p>契約の申込みの撤回又は解除に関する事項</p>
                <p>本アプリの性質上、購入後のお客様のご都合によるキャンセルはお受けできません。</p>
            </li>
            <li>
                <p>事業者の名称、住所、電話番号</p>
                <p>名称：ＯＢＦａｌｌ株式会社　代表取締役　上遠野　博紀</p>
                <p>住所：東京都港区海岸１－２－３汐留芝離宮ビルディング２１階</p>
                <p>電話番号：03-5403-5904</p>
            </li>
            <li>
                <p>事業者が法人であって、電子情報処理組織を利用する方法により広告をする場合には、当該事業者の代表者又は通信販売に関する業務の責任者の氏名</p>
                <p>上記５の通り。</p>
            </li>
            <li>
                <p>販売価格、送料等以外に購入者等が負担すべき金銭があるときには、その内容及びその額</p>
                <p>現時点ではない。</p>
            </li>
            <li>
                <p>いわゆるソフトウェアに関する取引である場合には、そのソフトウェアの動作環境</p>
                <p>店舗パスは、モバイルアプリとしてお楽しみいただけます。</p>
                <p>動作環境は以下のとおりです。</p>

                <p>アプリ</p>
                <p>Android</p>
                <p>　- 店舗パスバージョン1.0.0以降：Android 5.0以降</p>

                <p>iOS</p>
                <p>　- 店舗パスバージョン1.0.0以降：iOS 11.0以降</p>
            </li>
            <li>
                <p>商品の販売数量の制限等、特別な販売条件（役務提供条件）があるときは、その内容</p>
                <p>ある場合は個別のサービスの販売画面に表示します。</p>
            </li>
            <li>
                <p>電子メールによる商業広告を送る場合には、事業者の電子メールアドレス</p>
                <p>store-pass@obfall.co.jp</p>
            </li>
        </ol>

        <p style="text-align: right;">以上</p>
        <p style="text-align: right;">令和7年3月1日　制定</p>

    </div>
</body>

</html>
@endsection
