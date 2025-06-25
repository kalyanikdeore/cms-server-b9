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
        'videos' => $content->active_videos ?? []
    ]);
}
}   