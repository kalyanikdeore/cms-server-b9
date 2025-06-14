<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutNatureTherapy;
use Illuminate\Http\Request;

class AboutNatureTherapyController extends Controller
{
    /**
     * Display the active About Nature Therapy entry.
     */
    public function index()
    {
        $aboutTherapy = AboutNatureTherapy::where('is_active', true)
            ->latest() // fallback sorting by created_at
            ->first([
                'id',
                'title',
                'subtitle',
                'description',
                'video_path',
                'button_text',
                'button_link'
            ]);

        return response()->json($aboutTherapy);
    }

    /**
     * Store a newly created About Nature Therapy entry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'video_path' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $aboutTherapy = AboutNatureTherapy::create($validated);

        return response()->json($aboutTherapy, 201);
    }

    /**
     * Display the specified About Nature Therapy entry.
     */
    public function show(string $id)
    {
        $aboutTherapy = AboutNatureTherapy::findOrFail($id);
        return response()->json($aboutTherapy);
    }

    /**
     * Update the specified About Nature Therapy entry.
     */
    public function update(Request $request, string $id)
    {
        $aboutTherapy = AboutNatureTherapy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'video_path' => 'sometimes|string',
            'button_text' => 'sometimes|string|max:255',
            'button_link' => 'sometimes|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        $aboutTherapy->update($validated);

        return response()->json($aboutTherapy);
    }

    /**
     * Remove the specified About Nature Therapy entry.
     */
    public function destroy(string $id)
    {
        $aboutTherapy = AboutNatureTherapy::findOrFail($id);
        $aboutTherapy->delete();

        return response()->json(null, 204);
    }
}
