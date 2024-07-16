<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Lists;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::where('user_id', auth()->id())->get();
        return view('Board.index', compact('boards'));
    }

    public function show($id)
    {
        $board = Board::findOrFail($id);
        $boardlists = Lists::where('board_id', $board->id)->get();

        return view('Board.show', compact('board', 'boardlists'));
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

        $board = new Board;
        $board->title = $request->title;
        $board->description = $request->description;
        $board->user_id = auth()->id(); // Assurez-vous que vous avez une colonne user_id dans votre table boards
        $board->save();

        return redirect()->route('boards.index');
    }

    public function edit(Board $board)
    {
        return view('Board.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $board->title = $request->title;
        $board->description = $request->description;
        $board->save();

        return redirect()->route('boards.show', $board);
    }

    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('boards.index');
    }
}
