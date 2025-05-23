<?php

namespace App\Http\Controllers;

use App\Models\Preparation;
use App\Models\Startup;
use App\Models\History;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function show(Preparation $preparation)
    {
        $startup = $preparation->startup;
        return view('startup.show', compact('preparation', 'startup'));
    }

    public function create(Preparation $preparation)
    {
        return view('startup.create', compact('preparation'));
    }

    public function store(Request $request, Preparation $preparation)
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric|min:0|max:100',
            'analysis' => 'required|string'
        ]);

        $startup = $preparation->startup()->create($validated);

        // Update history record
        $history = History::where('process_type', 'preparation')
                         ->whereJsonContains('input_data->preparation->id', $preparation->id)
                         ->first();

        if ($history) {
            $history->update([
                'input_data' => array_merge($history->input_data, [
                    'startup' => $validated
                ])
            ]);
        }

        return redirect()->route('process.startup.show', $preparation)
            ->with('success', 'Data startup berhasil ditambahkan!');
    }

    public function edit(Preparation $preparation)
    {
        $startup = $preparation->startup;
        return view('startup.edit', compact('preparation', 'startup'));
    }

    public function update(Request $request, Preparation $preparation)
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric|min:0|max:100',
            'analysis' => 'required|string'
        ]);

        $preparation->startup()->update($validated);

        // Update history record
        $history = History::where('process_type', 'preparation')
                         ->whereJsonContains('input_data->preparation->id', $preparation->id)
                         ->first();

        if ($history) {
            $history->update([
                'input_data' => array_merge($history->input_data, [
                    'startup' => $validated
                ])
            ]);
        }

        return redirect()->route('process.startup.show', $preparation)
            ->with('success', 'Data startup berhasil diperbarui!');
    }
} 