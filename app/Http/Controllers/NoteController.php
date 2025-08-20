<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'notable_id' => 'required',
            'notable_type' => 'required|in:App\Models\Sale,App\Models\Product',
            'content' => 'required|string|max:500'
        ]);

        Note::create($request->all());
        return back()->with('success', 'Note added successfully');
    }
}