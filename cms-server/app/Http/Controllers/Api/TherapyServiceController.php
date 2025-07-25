<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TherapyService;
use Illuminate\Http\Request;

class TherapyServiceController extends Controller
{
    
    public function index()
    {
        try {
            $services = TherapyService::active()
                ->ordered()
                ->get(['id', 'title', 'description', 'icon', 'bg_color', 'text_color', 'border_color']);

            return response()->json([
                'success' => true,
                'data' => $services,
                'message' => 'Therapy services retrieved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve therapy services',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show($id)
    {
        try {
            $service = TherapyService::active()
                ->findOrFail($id, ['id', 'title', 'description', 'icon', 'bg_color', 'text_color', 'border_color']);

            return response()->json([
                'success' => true,
                'data' => $service,
                'message' => 'Therapy service retrieved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Therapy service not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}