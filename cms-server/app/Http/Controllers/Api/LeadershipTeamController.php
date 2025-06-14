<?php

namespace App\Http\Controllers\Api;
use App\Models\LeadershipTeam; // ✅ Import the model here 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadershipTeamController extends Controller
{
   
     public function index()
    {
        $team = LeadershipTeam::where('is_active', true)
            ->orderBy('sort_order')
            ->get(['name', 'role', 'image', 'desc']);

      
        $team->transform(function ($member) {
            $member->image = asset('storage/' . $member->image);
            return $member;
        });

        return response()->json([
            'success' => true,
            'data' => $team
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
