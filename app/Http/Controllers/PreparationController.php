<?php

namespace App\Http\Controllers;

use App\Models\Preparation;
use App\Models\History;
use Illuminate\Http\Request;

class PreparationController extends Controller
{
    public function index()
    {
        $preparations = Preparation::latest()->get();
        return view('preparation.index', compact('preparations'));
    }

    public function create()
    {
        return view('preparation.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'production_date' => 'required|date',
            'milk_qty' => 'required|numeric|min:0',
            'rennet_qty' => 'required|numeric|min:0',
            'citric_acid_qty' => 'required|numeric|min:0',
            'salt_qty' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $preparation = Preparation::create($validated);

        // Create initial history record
        History::create([
            'process_type' => 'preparation',
            'input_data' => [
                'preparation' => array_merge($validated, ['id' => $preparation->id]),
                'startup' => null,
                'shutdown' => null
            ],
            'status' => 'in_progress',
            'completed_at' => null,
        ]);

        return redirect()->route('preparation.index')
                         ->with('success', 'Data persiapan berhasil ditambahkan!');
    }

    public function edit(Preparation $preparation)
    {
        return view('preparation.edit', compact('preparation'));
    }

    public function update(Request $request, Preparation $preparation)
    {
        $validated = $request->validate([
            'production_date' => 'required|date',
            'milk_qty' => 'required|numeric|min:0',
            'rennet_qty' => 'required|numeric|min:0',
            'citric_acid_qty' => 'required|numeric|min:0',
            'salt_qty' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $preparation->update($validated);

        // Update history record
        $history = History::where('process_type', 'preparation')
                         ->whereJsonContains('input_data->preparation->id', $preparation->id)
                         ->first();

        if ($history) {
            $history->update([
                'input_data' => array_merge($history->input_data, [
                    'preparation' => array_merge($validated, ['id' => $preparation->id])
                ])
            ]);
        }

        return redirect()->route('preparation.index')
                         ->with('success', 'Data persiapan berhasil diperbarui!');
    }

    public function destroy(Preparation $preparation)
    {
        $preparation->delete();
        
        return redirect()->route('preparation.index')
                         ->with('success', 'Data persiapan berhasil dihapus!');
    }
}