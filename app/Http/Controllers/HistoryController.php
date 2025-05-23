<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::latest()->get();
        return view('history.index', compact('histories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'process_type' => 'required|string',
            'input_data' => 'required|array',
        ]);

        $history = History::create([
            'process_type' => $validated['process_type'],
            'input_data' => $validated['input_data'],
            'status' => 'completed',
            'completed_at' => now(),
        ]);

        return response()->json($history);
    }
}
