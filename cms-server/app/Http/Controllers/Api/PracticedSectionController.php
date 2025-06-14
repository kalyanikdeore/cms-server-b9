<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PracticedSection;
use Illuminate\Http\Request;

class PracticedSectionController extends Controller
{
    /**
     * Display the latest Practiced Section entry.
     */
    public function index()
    {
        $practicedSection = PracticedSection::latest()
            ->first([
                'id',
                'title',
                'description',
                'image_path'
            ]);

        return response()->json($practicedSection);
    }

    /**
     * Store a newly created Practiced Section entry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|string',
        ]);

        $practicedSection = PracticedSection::create($validated);

        return response()->json($practicedSection, 201);
    }

    /**
     * Display the specified Practiced Section entry.
     */
    public function show(string $id)
    {
        $practicedSection = PracticedSection::findOrFail($id);
        return response()->json($practicedSection);
    }

    /**
     * Update the specified Practiced Section entry.
     */
    public function update(Request $request, string $id)
    {
        $practicedSection = PracticedSection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image_path' => 'sometimes|string',
        ]);

        $practicedSection->update($validated);

        return response()->json($practicedSection);
    }

    /**
     * Remove the specified Practiced Section entry.
     */
    public function destroy(string $id)
    {
        $practicedSection = PracticedSection::findOrFail($id);
        $practicedSection->delete();

        return response()->json(null, 204);
    }
}