<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Edit List: ' . $list->title) }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-green-400 to-yellow-500 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-image bg-cover bg-center overflow-hidden shadow-2xl sm:rounded-lg p-8 shadow-custom">
                <div class="p-6 bg-black rounded-lg shadow-lg"> <!-- Changed background color to bg-black -->
                    <form action="{{ route('lists.update', $list) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ $list->title }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('boards.show', $list->board_id) }}" class="inline-block bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Cancel
                            </a>
                            <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-white font-bold rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
