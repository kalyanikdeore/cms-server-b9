<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TherapyFeature;
use Illuminate\Http\Request;

class TherapyFeatureController extends Controller
{
    /**
     * Display a listing of active features sorted by sort_order.
     */
    public function index()
    {
        $features = TherapyFeature::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();
            
        return response()->json($features);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'has_video' => 'boolean',
            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string',
            'youtube_url' => 'nullable|url'
        ]);

        $feature = TherapyFeature::create($validated);

        return response()->json($feature, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feature = TherapyFeature::findOrFail($id);
        return response()->json($feature);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feature = TherapyFeature::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'has_video' => 'boolean',
            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string',
            'youtube_url' => 'nullable|url'
        ]);

        $feature->update($validated);

        return response()->json($feature);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = TherapyFeature::findOrFail($id);
        $feature->delete();

        return response()->json(null, 204);
    }
}