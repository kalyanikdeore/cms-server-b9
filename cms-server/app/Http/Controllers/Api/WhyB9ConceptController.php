<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WhyB9Concept;
use Illuminate\Http\Request;

class WhyB9ConceptController extends Controller
{
    /**
     * Display a listing of the active resources.
     */
    public function index()
    {
        $concepts = WhyB9Concept::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json($concepts);
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyB9Concept $whyB9Concept)
    {
        if (!$whyB9Concept->is_active) {
            return response()->json(['message' => 'Concept not found'], 404);
        }

        return response()->json($whyB9Concept);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color_classes' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $concept = WhyB9Concept::create($validated);

        return response()->json($concept, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyB9Concept $whyB9Concept)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'icon' => 'sometimes|string|max:255',
            'color_classes' => 'sometimes|string|max:255',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $whyB9Concept->update($validated);

        return response()->json($whyB9Concept);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyB9Concept $whyB9Concept)
    {
        $whyB9Concept->delete();

        return response()->json(null, 204);
    }
}