<?php

namespace App\Http\Controllers\Api;

use App\Models\NatureTherapy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NatureTherapyController extends Controller
{
    public function index()
    {
        // Get all nature therapies (not just first)
        $therapies = NatureTherapy::all();
        
        if ($therapies->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No nature therapy data found'
            ], 404);
        }
        
        // Transform each therapy to include full image URL
        $transformedTherapies = $therapies->map(function ($therapy) {
            return [
                'id' => $therapy->id,
                'title' => $therapy->title,
                'subtitle' => $therapy->subtitle,
                'background_image_url' => asset('storage/'.$therapy->background_image),
                'created_at' => $therapy->created_at,
                'updated_at' => $therapy->updated_at
            ];
        });
        
        return response()->json([
            'success' => true,
            'data' => $transformedTherapies
        ]);
    }

    // Optional: Single therapy endpoint
    public function show($id)
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
            'data' => [
                'id' => $therapy->id,
                'title' => $therapy->title,
                'subtitle' => $therapy->subtitle,
                'background_image_url' => asset('storage/'.$therapy->background_image),
                'created_at' => $therapy->created_at,
                'updated_at' => $therapy->updated_at
            ]
        ]);
    }
}