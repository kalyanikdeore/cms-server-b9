<?php

namespace App\Http\Controllers\Api;

use App\Models\NatureTherapy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NatureTherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $therapy = NatureTherapy::first();
        
        return response()->json([
            'success' => true,
            'data' => $therapy
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'background_image' => 'required|string',
        ]);

        $therapy = NatureTherapy::create($validated);

        return response()->json([
            'success' => true,
            'data' => $therapy
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $therapy = NatureTherapy::find($id);

        if (!$therapy) {
            return response()->json([
                'success' => false,
                'message' => 'Nature therapy not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $therapy
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $therapy = NatureTherapy::find($id);

        if (!$therapy) {
            return response()->json([
                'success' => false,
                'message' => 'Nature therapy not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'sometimes|string|max:255',
            'background_image' => 'sometimes|string',
        ]);

        $therapy->update($validated);

        return response()->json([
            'success' => true,
            'data' => $therapy
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $therapy = NatureTherapy::find($id);

        if (!$therapy) {
            return response()->json([
                'success' => false,
                'message' => 'Nature therapy not found'
            ], 404);
        }

        $therapy->delete();

        return response()->json([
            'success' => true,
            'message' => 'Nature therapy deleted successfully'
        ]);
    }
}