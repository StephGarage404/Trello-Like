<?php
namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Lists;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function store(Request $request, Board $board)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $list = new Lists;
        
        $list->title = $request->title;
        $list->board_id = $board->id;
     
        $list->save();

        return redirect()->route('boards.show', $board);
    }

    public function update(Request $request, Lists $list)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $list->title = $request->title;
        $list->save();

        return redirect()->route('boards.show', $list->board);
    }

    public function destroy(Lists $list)
    {
        $board = $list->board;
        $list->delete();

        return redirect()->route('boards.show', $board);
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
        ]);

        foreach ($request->order as $index => $listId) {
            $list = Lists::find($listId);
            $list->order = $index;
            $list->save();
        }

        return response()->json(['status' => 'success']);
    }
}
