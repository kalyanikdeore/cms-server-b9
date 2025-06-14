<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department; // Add this import
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    try {
        $departments = Department::active()
            ->sorted()
            ->get(['id', 'title', 'content', 'icon', 'image']);

        return response()->json([
            'status' => 'success',
            'message' => 'Departments retrieved successfully',
            'data' => $departments
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve departments',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'required|string',
            'image' => 'required|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $department = Department::create($validated);

        return response()->json($department, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'icon' => 'sometimes|string',
            'image' => 'sometimes|string',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'sometimes|integer'
        ]);

        $department->update($validated);

        return response()->json($department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(null, 204);
    }
}