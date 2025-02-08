<!-- resources/views/vendor/pagination/tailwind.blade.php -->
@if ($paginator->hasPages())
    <div class="flex justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="bg-gray-300 text-gray-500 py-2 px-4 rounded-lg cursor-not-allowed">前へ</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">前へ</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-300">次へ</a>
        @else
            <span class="bg-gray-300 text-gray-500 py-2 px-4 rounded-lg cursor-not-allowed">次へ</span>
        @endif
    </div>
@endif
