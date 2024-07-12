<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Your Boards') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-yellow-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg p-8">
                <div class="mb-6 text-center">
                    <a href="{{ route('boards.create') }}" class="inline-block bg-custom-green hover:bg-custom-green-hover text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Créer un tableau
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($boards as $board)
                        <div class="bg-cover bg-center bg-blue-100 p-6 rounded-lg shadow-lg min-h-[300px]" style="background-image: url('/images/background.jpg');">
                            <h3 class="text-xl font-semibold mb-4 text-white">{{ $board->title }}</h3>
                            <p class="text-white mb-4">{{ $board->description }}</p>
                            <div class="flex space-x-4 mt-4">
                                <a href="{{ route('boards.show', $board) }}" class="inline-block bg-custom-green hover:bg-custom-green-light text-white font-bold py-2 px-4 rounded-lg shadow-custom transition duration-300 ease-in-out transform hover:scale-105 flex-1 text-center">
                                    View Board
                                </a>
                                <a href="{{ route('boards.edit', $board) }}" class="inline-block bg-custom-green hover:bg-custom-green-light text-white font-bold py-2 px-4 rounded-lg shadow-custom transition duration-300 ease-in-out transform hover:scale-105 flex-1 text-center">
                                    Edit Board
                                </a>
                            </div>
                            <form action="{{ route('boards.destroy', $board) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-custom">
                                    Delete Board
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-700">No boards found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>