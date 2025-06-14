<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    /**
     * Display a listing of the vision & mission items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visionMissions = VisionMission::orderBy('created_at', 'desc')->get();
            
        return response()->json($visionMissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $visionMission = VisionMission::create(array_merge([
            'icon' => 'Eye' // default value
        ], $validated));

        return response()->json($visionMission, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function show(VisionMission $visionMission)
    {
        return response()->json($visionMission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisionMission $visionMission)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $visionMission->update($validated);

        return response()->json($visionMission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisionMission $visionMission)
    {
        $visionMission->delete();

        return response()->json(null, 204);
    }
}