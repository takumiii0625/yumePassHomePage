<!-- resources/views/admin/stores/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">店舗一覧</h1>
    <a href="{{ route('admin.stores.create') }}" class="inline-block bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300 mb-6">店舗を追加</a>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">店舗名</th>
                    <th class="px-6 py-3 text-left">詳細</th>
                    <th class="px-6 py-3 text-left">住所</th>
                    <th class="px-6 py-3 text-left">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $store->name }}</td>
                        <td class="px-6 py-4">{{ $store->description }}</td>
                        <td class="px-6 py-4">{{ $store->location }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.stores.edit', $store->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">編集</a>
                            <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300 ml-4">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション -->
    <div class="mt-8">
        {{ $stores->links('vendor.pagination.tailwind') }}
    </div>
@endsection
