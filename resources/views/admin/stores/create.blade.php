<!-- resources/views/admin/stores/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>新しい店舗を追加</h1>
    <form action="{{ route('admin.stores.store') }}" method="POST">
        @csrf
        <label for="name">店舗名</label>
        <input type="text" name="name" required>

        <label for="description">詳細</label>
        <textarea name="description" required></textarea>

        <label for="location">住所</label>
        <input type="text" name="location" required>

        <button type="submit">保存</button>
    </form>
@endsection
