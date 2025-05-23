<?php

namespace App\Http\Controllers;

use App\Models\Preparation;
use App\Models\Shutdown;
use Illuminate\Http\Request;

class ShutdownController extends Controller
{
    public function show(Preparation $preparation)
    {
        $shutdown = $preparation->shutdown;
        return view('shutdown.show', compact('preparation', 'shutdown'));
    }

    public function create(Preparation $preparation)
    {
        return view('shutdown.create', compact('preparation'));
    }

    public function store(Request $request, Preparation $preparation)
    {
        $validated = $request->validate([
            'cheese_weight' => 'required|numeric|min:0',
            'whey_volume' => 'required|numeric|min:0',
            'final_analysis' => 'required|string'
        ]);

        $shutdown = $preparation->shutdown()->create($validated);

        return redirect()->route('shutdown.show', $preparation)
            ->with('success', 'Data shutdown berhasil ditambahkan!');
    }

    public function edit(Preparation $preparation)
    {
        $shutdown = $preparation->shutdown;
        return view('shutdown.edit', compact('preparation', 'shutdown'));
    }

    public function update(Request $request, Preparation $preparation)
    {
        $validated = $request->validate([
            'cheese_weight' => 'required|numeric|min:0',
            'whey_volume' => 'required|numeric|min:0',
            'final_analysis' => 'required|string'
        ]);

        $preparation->shutdown()->update($validated);

        return redirect()->route('shutdown.show', $preparation)
            ->with('success', 'Data shutdown berhasil diperbarui!');
    }
} 