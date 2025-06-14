<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of active clients for API
     */
    public function index()
    {
        return Client::where('is_active', true)
            ->orderBy('order')
            ->get(['name', 'image']);
    }

    /**
     * Store a new client (if needed outside Filament)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $client = Client::create($validated);

        return response()->json($client, 201);
    }

    /**
     * Display the specified client
     */
    public function show(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Update a client (if needed outside Filament)
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean'
        ]);

        $client->update($validated);

        return response()->json($client);
    }

    /**
     * Remove the specified client
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}