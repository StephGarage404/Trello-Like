<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Boards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('boards.create') }}" class="btn btn-primary">Create New Board</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($boards as $board)
                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-bold">{{ $board->title }}</h3>
                            <p>{{ $board->description }}</p>
                            <a href="{{ route('boards.show', $board) }}" class="btn btn-secondary mt-2">View Board</a>
                            <a href="{{ route('boards.edit', $board) }}" class="btn btn-secondary mt-2">Edit Board</a>
                            <form action="{{ route('boards.destroy', $board) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Board</button>
                            </form>
                        </div>
                    @empty
                        <p>No boards found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
