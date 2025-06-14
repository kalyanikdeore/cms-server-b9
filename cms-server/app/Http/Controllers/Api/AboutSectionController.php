<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    /**
     * Display a listing of the about sections.
     */
    public function index()
    {
        try {
            $aboutSections = AboutSection::active()
                ->ordered()
                ->get(['id', 'main_image', 'scientist_image', 'title', 'content', 'sort_order']);

            return response()->json([
                'success' => true,
                'data' => $aboutSections,
                'message' => 'About sections retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve about sections',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implement if needed
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement if needed
    }
}