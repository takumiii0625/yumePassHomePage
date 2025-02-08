<!-- resources/views/admin/stores/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>店舗情報を編集</h1>
    <form action="{{ route('admin.stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">店舗名</label>
        <input type="text" name="name" value="{{ $store->name }}" required>

        <label for="description">詳細</label>
        <textarea name="description" required>{{ $store->description }}</textarea>

        <label for="location">住所</label>
        <input type="text" name="location" value="{{ $store->location }}" required>

        <button type="submit">更新</button>
    </form>
@endsection
