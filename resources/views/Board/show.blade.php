<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Board: ' . $board->title) }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-green-400 to-yellow-500 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-image bg-cover bg-center overflow-hidden shadow-2xl sm:rounded-lg p-8 shadow-custom">
                <h1 class="text-4xl font-bold mb-6 text-white">{{ $board->title }}</h1>
                <p class="text-gray-100 mb-8">{{ $board->description }}</p>
                <div class="flex justify-between items-center mb-6">
                    <a href="{{ route('boards.index') }}" class="inline-block bg-green-800 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Retour aux tableaux
                    </a>
                    <a href="{{ route('lists.create', $board) }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 ml-4">
                        Créer une nouvelle liste
                    </a>
                </div>

                <!-- Display Lists Here -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($boardlists as $boardlist)
                        <div class="bg-white border border-gray-300 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl">
                            <div class="p-6 bg-red-600"> <!-- Added bg-red-600 class for red background -->
                                <h5 class="text-xl font-semibold text-white mb-2">{{ $boardlist->title }}</h5>
                                <p class="text-gray-200">{{ $boardlist->board_id }}</p>
                            </div>
                            <div class="flex justify-between items-center px-6 py-4 bg-green-500 hover:bg-green-400 rounded-b-lg">
                                <a href="{{ route('lists.edit', $boardlist) }}" class="text-sm font-medium text-white hover:text-gray-200 transition duration-300 ease-in-out">
                                    Edit
                                </a>
                                <form action="{{ route('lists.destroy', $boardlist) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-white bg-red-500 rounded-md px-4 py-2 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('boards.edit', $board) }}" class="inline-block bg-green-800 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 relative overflow-hidden">
                    <span class="bg-gradient-to-r from-white via-white to-transparent absolute top-0 left-0 w-full h-full opacity-0 transition-opacity duration-300 ease-in-out"></span>
                    Modifier le tableau
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
