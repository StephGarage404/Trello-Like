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
                    Retour aux tableaux
                </a>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($boardlists as $boardlist)
                            <li class="max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl">
                                <a class="text-blue-500">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-rose">{{ $boardlist->title }}</h5>
                                </a>
                                <p class="mt-2 text-gray-600">{{ $boardlist->board_id }}</p>
                                <div class="mt-4 flex space-x-4">
                                    <a class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-peche rounded-md shadow-md hover:bg-peche-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-peche">
                                        Edit
                                    </a>
                                    <form action="" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-md shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('boards.edit', $board) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Modifier le tableau
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
