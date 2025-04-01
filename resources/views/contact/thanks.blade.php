@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white border border-gray-300 text-gray-700 rounded-lg shadow-md">
            <div class="px-6 py-4 bg-blue-100 border-b border-blue-300 rounded-t-lg">
                <h2 class="text-xl font-semibold">お問い合わせいただきありがとうございます</h2>
            </div>

            <div class="p-6">
                <p class="text-sm text-gray-700">お客様からのお問い合わせを正常に受け付けました。</p>
                <p class="mt-2 text-sm text-gray-700">担当者が確認後、3営業日以内にご連絡させていただきますので、しばらくお待ちください。</p>
            </div>
        </div>
    </div>
</div>
@endsection
