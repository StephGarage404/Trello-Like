<!-- resources/views/Board/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ $board->description }}</p>

                    <div class="mt-6">
                        <h3 class="text-xl font-semibold mb-4">{{ __('Lists') }}</h3>
                        <ul>
                            @foreach ($board->lists as $list)
                                <li class="mb-2">{{ $list->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <a href="{{ route('boards.index') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-gray-500 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 dark:hover:bg-gray-800 focus:outline-none focus:border-gray-700 dark:focus:border-gray-900 focus:ring focus:ring-gray-300 dark:focus:ring-gray-700 active:bg-gray-600 dark:active:bg-gray-800 disabled:opacity-25 transition">
                        {{ __('Back to Boards') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

