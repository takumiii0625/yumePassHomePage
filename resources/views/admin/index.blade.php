@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">店舗一覧</h1>

    <!-- 店舗追加ボタン -->
    <a href="{{ route('adminStoreControllerInput') }}" class="inline-block bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300 mb-6">
        店舗を追加
    </a>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">店舗名</th>
                    <th class="px-6 py-3 text-left">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $store->name }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('adminStoreControllerShow', $store->id) }}" class="text-green-600 hover:text-green-800 transition duration-300">詳細</a>
                            <a href="{{ route('adminStoreControllerEditInput', $store->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300 ml-4">編集</a>
                            <form action="{{ route('adminStoreControllerDeleteExecute', $store->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete();">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300 ml-4">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション（店舗） -->
    <div class="mt-8">
        {{ $stores->links('vendor.pagination.tailwind') }}
    </div>

    <!-- お知らせ一覧 -->
    <h1 class="text-3xl font-semibold mt-12 mb-6">お知らせ一覧</h1>

    <!-- お知らせ追加ボタン -->
    <a href="{{ route('adminNewsCreateInput') }}" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 mb-6">
        お知らせを追加
    </a>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">タイトル</th>
                    <th class="px-6 py-3 text-left">公開日</th>
                    <th class="px-6 py-3 text-left">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $item->title }}</td>
                        <td class="px-6 py-4">{{ $item->published_at ?? '未設定' }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('adminNewsShow', $item->id) }}" class="text-green-600 hover:text-green-800 transition duration-300">詳細</a>
                            <a href="{{ route('adminNewsEditInput', $item->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300 ml-4">編集</a>
                            <form action="{{ route('adminNewsDeleteExecute', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete();">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300 ml-4">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション（お知らせ） -->
    <div class="mt-8">
        {{ $news->links('vendor.pagination.tailwind') }}
    </div>
@endsection

@section('scripts')
<script>
    function confirmDelete() {
        return confirm('本当に削除しますか？');
    }
</script>
@endsection
