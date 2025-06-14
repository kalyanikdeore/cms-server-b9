<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientStory;
use Illuminate\Http\Request;

class PatientStoryController extends Controller
{
    /**
     * Display a listing of patient stories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $stories = PatientStory::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get(['id', 'title', 'description', 'image', 'is_featured']);

            return response()->json([
                'success' => true,
                'data' => $stories,
                'message' => 'Patient stories retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve patient stories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of featured patient stories.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        try {
            $stories = PatientStory::where('is_featured', true)
                ->orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get(['id', 'title', 'description', 'image']);

            return response()->json([
                'success' => true,
                'data' => $stories,
                'message' => 'Featured patient stories retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve featured patient stories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created patient story in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|string',
                'is_featured' => 'boolean',
                'sort_order' => 'integer'
            ]);

            $story = PatientStory::create($validated);

            return response()->json([
                'success' => true,
                'data' => $story,
                'message' => 'Patient story created successfully'
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create patient story',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified patient story.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $story = PatientStory::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $story,
                'message' => 'Patient story retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Patient story not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified patient story in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $story = PatientStory::findOrFail($id);

            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'image' => 'nullable|string',
                'is_featured' => 'boolean',
                'sort_order' => 'integer'
            ]);

            $story->update($validated);

            return response()->json([
                'success' => true,
                'data' => $story,
                'message' => 'Patient story updated successfully'
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update patient story',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified patient story from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $story = PatientStory::findOrFail($id);
            $story->delete();

            return response()->json([
                'success' => true,
                'message' => 'Patient story deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete patient story',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}