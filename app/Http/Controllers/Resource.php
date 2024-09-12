<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class Resource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return "soy resource";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => 'required|in:surf,windsurf,kayak,atv,hot air balloon',
            'user_id' => 'required|exists:users,id',
            'datetime' => 'required|date',
            'paid' => 'boolean',
            'notes' => 'required|string',
            'satisfaction' => 'nullable|integer|between:1,10',
        ]);

        $activity = Activity::create($validated);

        return redirect()->route('resource')->with('success', 'Creaste una nueva actividad!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'type' => 'required|in:surf,windsurf,kayak,atv,hot air balloon',
            'user_id' => 'required|exists:users,id',
            'datetime' => 'required|date',
            'paid' => 'boolean',
            'notes' => 'required|string',
            'satisfaction' => 'nullable|integer|between:1,10',
        ]);

        // Buscar la actividad por su id y actualizarla
        $activity = Activity::findOrFail($id);
        $activity->update($validated);

        return redirect()->route('resource')->with('success', 'Editaste una actividad!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('resource')->with('success', 'Eliminaste una actividad!');

    }
}
