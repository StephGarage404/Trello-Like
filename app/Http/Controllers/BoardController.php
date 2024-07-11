<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BoardController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $boards = Board::where('user_id', auth()->id())->get();
        return view('Board.index', compact('boards'));
    }

    public function show(Board $board)
    {
        $this->authorize('view', $board);
        return view('Board.show', compact('board'));
    }

    public function create()
    {
        return view('Board.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Board::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('boards.index')->with('success', 'Board created successfully.');
    }

    public function edit(Board $board)
    {
        $this->authorize('update', $board);
        return view('Board.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $this->authorize('update', $board);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $board->update($request->only(['title', 'description']));

        return redirect()->route('boards.index')->with('success', 'Board updated successfully.');
    }

    public function destroy(Board $board)
    {
        $this->authorize('delete', $board);
        $board->delete();

        return redirect()->route('boards.index')->with('success', 'Board deleted successfully.');
    }
}