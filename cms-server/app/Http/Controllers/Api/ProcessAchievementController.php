<?php

namespace App\Http\Controllers\Api;
use App\Models\ProcessAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProcessAchievementController extends Controller
{
    public function index()
    {
        $achievements = ProcessAchievement::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return response()->json($achievements);
    }
}