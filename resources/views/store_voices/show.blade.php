@extends('layouts.app')

@section('title', ($voice->title ?? '店舗インタビュー') . ' | ストパス')

@section('content')
<div class="py-12 bg-gray-100 text-gray-800">
  <div class="max-w-4xl mx-auto px-6">

    <div class="mb-6">
      <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 transition">
        ← トップへ戻る
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-10">
      <p class="text-sm text-gray-500 mb-2">
        @if($voice->published_at)
          {{ \Carbon\Carbon::parse($voice->published_at)->format('Y.m.d') }}
        @endif
        @if($voice->store)
          <span class="mx-1">/</span>{{ $voice->store->name }}
        @endif
      </p>

      <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
        {{ $voice->title ?? '店舗インタビュー' }}
      </h1>

      @if($voice->excerpt)
        <div class="mb-6 p-4 rounded-lg bg-gray-50 border border-gray-200 text-gray-700">
          {{ $voice->excerpt }}
        </div>
      @endif

      @if($voice->interviewed_at)
        <p class="text-sm text-gray-500 mb-6">
          インタビュー日：{{ \Carbon\Carbon::parse($voice->interviewed_at)->format('Y.m.d') }}
        </p>
      @endif

      @if(!empty($voice->image))
        <div class="mb-6">
          <img src="{{ asset($voice->image) }}" alt="{{ $voice->title }}" class="w-full rounded-xl border border-gray-200">
        </div>
      @endif

      <div class="prose max-w-none">
        {!! nl2br(e($voice->body)) !!}
      </div>
    </div>
  </div>
</div>
@endsection
