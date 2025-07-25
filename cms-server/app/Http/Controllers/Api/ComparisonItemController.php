<?php

namespace App\Http\Controllers\Api;

use App\Models\ComparisonItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Changed this line

class ComparisonItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ComparisonItem::orderBy('sort_order')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feature' => 'required|string|max:255',
            'traditional' => 'required|string|max:255',
            'b9' => 'required|string|max:255',
            'sort_order' => 'integer',
            'show_icons' => 'boolean',
        ]);

        return ComparisonItem::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(ComparisonItem $comparisonItem)
    {
        return $comparisonItem;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComparisonItem $comparisonItem)
    {
        $validated = $request->validate([
            'feature' => 'sometimes|required|string|max:255',
            'traditional' => 'sometimes|required|string|max:255',
            'b9' => 'sometimes|required|string|max:255',
            'sort_order' => 'sometimes|integer',
            'show_icons' => 'sometimes|boolean',
        ]);

        $comparisonItem->update($validated);

        return $comparisonItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComparisonItem $comparisonItem)
    {
        $comparisonItem->delete();

        return response()->noContent();
    }
}