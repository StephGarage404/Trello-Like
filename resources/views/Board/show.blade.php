<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Board: ' . $board->title) }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-yellow-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg p-8">
                <h1 class="text-4xl font-bold mb-6 text-blue-800">{{ $board->title }}</h1>
                <p class="text-gray-700 mb-8">{{ $board->description }}</p>
                <a href="{{ route('boards.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Back to Boards
                </a>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($board->lists as $list)
                    <div class="bg-blue-100 shadow-lg rounded-lg p-6">
                        <h3 class="text-2xl font-semibold mb-4 text-blue-800">{{ $list->title }}</h3>
                        <ul class="space-y-4">
                            @foreach ($list->cards as $card)
                                <li class="bg-yellow-100 p-5 rounded-lg shadow-md">
                                    <h5 class="text-xl font-medium text-yellow-800">{{ $card->title }}</h5>
                                    <p class="text-base text-yellow-700">{{ $card->description }}</p>
                                    <p class="text-sm text-yellow-600">Assigned to: {{ $card->user->name ?? 'Unassigned' }}</p>
                                    <p class="text-sm text-yellow-600">Due date: {{ $card->due_date ?? 'No due date' }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('boards.edit', $board) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Edit Board
                </a>
            </div>
        </div>
    </div>
</x-app-layout>