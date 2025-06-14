<?php

namespace App\Http\Controllers\Api;
use App\Models\ValueSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValueSectionController extends Controller
{
    /**
     * Display a listing of active value sections for API (used by React component)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = ValueSection::active()
            ->ordered()
            ->get(['quote', 'author', 'role',  'rating']);

        return response()->json($testimonials);
    }

    /**
     * Store a newly created value section (alternative to Filament admin)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quote' => 'required|string|max:2000',
            'author' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
           
            'rating' => 'nullable|integer|between:1,5',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $testimonial = ValueSection::create($validated);

        return response()->json($testimonial, 201);
    }
}