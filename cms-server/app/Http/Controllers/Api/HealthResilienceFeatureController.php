<?php

namespace App\Http\Controllers\Api;
use App\Models\HealthResilienceFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthResilienceFeatureController extends Controller
{
    public function index()
    {
        $features = HealthResilienceFeature::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        if ($features->isEmpty()) {
            return response()->json([]);
        }

        return response()->json([
            'sectionTitle' => $features->first()->section_title,
            'sectionDescription' => $features->first()->section_description,
            'videoUrl' => $features->first()->video_url,
            'features' => $features->map(function($feature) {
                return [
                    'title' => $feature->title,
                    'description' => $feature->description
                ];
            })
        ]);
    }
}