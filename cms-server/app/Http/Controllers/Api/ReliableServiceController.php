<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReliableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReliableServiceController extends Controller
{
    /**
     * Display a listing of active, ordered services
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $services = ReliableService::query()
                ->where('is_active', true)
                ->orderBy('order')
                ->get()
                ->map(function ($service) {
                    return [
                        'id' => $service->id,
                        'title' => $service->title,
                        'description' => $service->description,
                        'image_path' => $service->image_path 
                            ? Storage::url($service->image_path)
                            : null,
                        'background_color' => $service->background_color,
                        'order' => $service->order,
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $services
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to fetch reliable services: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve services',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}