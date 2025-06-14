<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReliableService;
use Illuminate\Http\Request;

class ReliableServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    try {
        $services = ReliableService::active()
            ->ordered()
            ->get(['id', 'title', 'description', 'image_path', 'order']);

        return response()->json([
            'success' => true,
            'data' => $services
        ]);

    } catch (\Exception $e) {
        \Log::error('Failed to fetch services: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve services',
            'error' => $e->getMessage()
        ], 500);
    }
}
    // Other controller methods (store, show, update, destroy) can be added here
}