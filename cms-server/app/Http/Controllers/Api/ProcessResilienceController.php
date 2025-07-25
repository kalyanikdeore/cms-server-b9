<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProcessResilience;
use Illuminate\Http\Request;

class ProcessResilienceController extends Controller
{
    public function index()
    {
        $content = ProcessResilience::where('is_active', true)->first();
        
        return response()->json([
            'title' => $content->title ?? 'What is Process Resilience?',
            'description' => $content->description ?? 'Default description...',
            'video1' => $content->video1 ? url('uploads/' . $content->video1) : null,
            'video2' => $content->video2 ? url('uploads/' . $content->video2) : null,
            'videos' => $content->active_videos ?? []
        ]);
    }
}
