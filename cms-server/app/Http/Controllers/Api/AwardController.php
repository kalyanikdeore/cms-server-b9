<?php
// app/Http/Controllers/Api/AwardController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::active()->ordered()->get();
        
        return response()->json([
            'success' => true,
            'data' => $awards
        ]);
    }

    public function show($id)
    {
        $award = Award::find($id);
        
        if (!$award) {
            return response()->json([
                'success' => false,
                'message' => 'Award not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $award
        ]);
    }
}