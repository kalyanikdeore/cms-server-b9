<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CommunityAchievement;
use Illuminate\Http\Request;

class CommunityAchievementController extends Controller
{
    public function index()
    {
        $achievements = CommunityAchievement::active()
            ->ordered()
            ->get();

        return response()->json($achievements);
    }
}