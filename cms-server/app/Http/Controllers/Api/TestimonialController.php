<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of active testimonials.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $testimonials = Testimonial::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->get(['quote', 'author', 'role', 'avatar']);

            return response()->json([
                'success' => true,
                'data' => $testimonials,
                'message' => 'Testimonials retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve testimonials',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'quote' => 'required|string|max:1000',
                'author' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'avatar' => 'nullable|string|max:2',
                'is_active' => 'boolean'
            ]);

            $testimonial = Testimonial::create($validated);

            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Testimonial created successfully'
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
                'message' => 'Failed to create testimonial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified testimonial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Testimonial retrieved successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Testimonial not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified testimonial in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);

            $validated = $request->validate([
                'quote' => 'sometimes|string|max:1000',
                'author' => 'sometimes|string|max:255',
                'role' => 'sometimes|string|max:255',
                'avatar' => 'nullable|string|max:2',
                'is_active' => 'boolean'
            ]);

            $testimonial->update($validated);

            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Testimonial updated successfully'
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
                'message' => 'Failed to update testimonial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified testimonial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->delete();

            return response()->json([
                'success' => true,
                'message' => 'Testimonial deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete testimonial',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}