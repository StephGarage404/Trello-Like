<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle liste pour : ' . $board->title) }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-yellow-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg p-8 shadow-custom">
                <form action="{{ route('lists.store', $board) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre de la liste</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-green focus:ring focus:ring-custom-green-light focus:ring-opacity-50" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-block bg-custom-green hover:bg-custom-green-hover text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Créer la liste
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
