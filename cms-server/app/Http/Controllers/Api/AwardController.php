<?php
// app/Http/Controllers/Api/NatureTherapyController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NatureTherapy;
use Illuminate\Http\Request;

class NatureTherapyController extends Controller
{
    public function index()
    {
        $therapies = NatureTherapy::all();
        
        return response()->json([
            'success' => true,
            'data' => $therapies->map(function ($therapy) {
                return [
                    'id' => $therapy->id,
                    'title' => $therapy->title,
                    'subtitle' => $therapy->subtitle,
                    'background_image_url' => $therapy->background_image 
                        ? asset('storage/'.$therapy->background_image)
                        : null,
                ];
            })
        ]);
    }

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
                'background_image_url' => $therapy->background_image 
                    ? asset('storage/'.$therapy->background_image)
                    : null,
            ]
        ]);
    }
}