<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TherapyPlatform;
use Illuminate\Http\Request;

class PlatformFeatureController extends Controller
{
    public function therapyFeatures()
    {
        try {
            $features = TherapyPlatform::active()
                        ->ordered()
                        ->get()
                        ->groupBy('tab_name');
            
            // Structure the response with all tabs
            $response = [
                'technology' => $features['technology'] ?? [],
                'methods' => $features['methods'] ?? [],
                'research' => $features['research'] ?? []
            ];

            return response()->json([
                'success' => true,
                'data' => $response
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load therapy features',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}