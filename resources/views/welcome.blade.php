@extends('layouts.app')

@section('title', 'レストランのメニューを今すぐチェック！')

@section('content')
    <!-- ヒーローセクション -->
    <div class="bg-gradient-to-r from-green-500 via-teal-400 to-blue-500 text-black py-32">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4 text-black">あなたの好きな料理がすぐに見つかる！</h1>
            <p class="text-2xl mb-8 text-black">メニューをチェックして、サブスクリプション特典を楽しもう！</p>
            <a href="/menu" class="bg-teal-600 text-black hover:bg-teal-700 hover:text-white py-3 px-8 rounded-full text-xl transition duration-300 ease-in-out">
                メニューを見る
            </a>
        </div>
    </div>

    <!-- サブスクリプション特典セクション -->
    <div class="py-16 bg-white text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">サブスクに登録して、特典をゲット！</h2>
            <p class="text-lg text-gray-600 mb-8">サブスクリプションに登録すると、来店時に1品無料の特典がついてきます！</p>
            <div class="bg-teal-100 p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-teal-700 mb-4">サブスクリプション特典</h3>
                <p class="text-xl text-teal-600 mb-6">月額のサブスクリプションで、来店時に無料で1品をお選びいただけます。</p>
                <a href="/subscribe" class="bg-teal-600 text-black hover:bg-teal-700 hover:text-white py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out">
                    サブスク登録
                </a>
            </div>
        </div>
    </div>

    <!-- メニューセクション -->
    <div class="py-16 bg-gray-100 text-center">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">豊富なメニューをチェック</h3>
            <p class="text-lg text-gray-600 mb-8">あなたの好きな料理を、今すぐアプリでチェック！</p>
            <a href="/menu" class="bg-green-600 text-black hover:bg-green-700 hover:text-white py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out">
                メニューを見る
            </a>
        </div>
    </div>

    <!-- お客様の声セクション -->
    <div class="py-16 bg-white text-center">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">お客様の声</h3>
            <p class="text-lg text-gray-600 mb-8">多くのお客様がこのサービスを利用し、特典を楽しんでいます！</p>
            <div class="flex justify-center space-x-8">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <p class="text-lg text-gray-600 mb-4">「サブスクリプション登録で、毎回違う料理が無料になるので、友達との食事が楽しみです！」</p>
                    <h4 class="font-semibold text-gray-700">山田 太郎</h4>
                    <p class="text-gray-500">★★★★★</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <p class="text-lg text-gray-600 mb-4">「メニューが豊富で、毎回楽しんでいます！サブスク特典で無料料理も嬉しいです。」</p>
                    <h4 class="font-semibold text-gray-700">佐藤 花子</h4>
                    <p class="text-gray-500">★★★★☆</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <p class="text-lg text-gray-600 mb-4">「料理のクオリティが高く、サブスクリプションでお得感が増しました！」</p>
                    <h4 class="font-semibold text-gray-700">田中 一郎</h4>
                    <p class="text-gray-500">★★★★★</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTAセクション -->
    <div class="py-16 bg-green-500 text-black text-center">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold mb-4">今すぐサブスクに登録して、お得に料理を楽しもう！</h3>
            <p class="text-lg mb-6">サブスクリプションに登録して、来店時に1品無料！あなたの食事をよりお得に。</p>
            <a href="/subscribe" class="bg-teal-600 text-black hover:bg-teal-700 hover:text-white py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out">
                サブスク登録
            </a>
        </div>
    </div>
@endsection
