<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutNatureTherapy;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AboutNatureTherapyController extends Controller
{
    /**
     * Display the active about nature therapy section
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $aboutTherapy = AboutNatureTherapy::active()
                ->ordered()
                ->first(['id', 'title', 'subtitle', 'description', 'video_path', 'button_text', 'button_link', 'order']);

            if (!$aboutTherapy) {
                return response()->json([
                    'success' => false,
                    'message' => 'No active about therapy section found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $aboutTherapy,
                'message' => 'About therapy section retrieved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve about therapy section',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'video_path' => 'nullable|url',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        try {
            $therapy = AboutNatureTherapy::create($validated);
            
            return response()->json([
                'success' => true,
                'data' => $therapy,
                'message' => 'About therapy section created successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create about therapy section',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource
     */
    public function show(string $id): JsonResponse
    {
        try {
            $therapy = AboutNatureTherapy::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $therapy,
                'message' => 'About therapy section retrieved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'About therapy section not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'sometimes|string',
            'video_path' => 'nullable|url',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        try {
            $therapy = AboutNatureTherapy::findOrFail($id);
            $therapy->update($validated);

            return response()->json([
                'success' => true,
                'data' => $therapy,
                'message' => 'About therapy section updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update about therapy section',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $therapy = AboutNatureTherapy::findOrFail($id);
            $therapy->delete();

            return response()->json([
                'success' => true,
                'message' => 'About therapy section deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete about therapy section',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}