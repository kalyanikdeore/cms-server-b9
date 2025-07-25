<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    /**
     * Get contact settings
     */
    public function index()
    {
        $settings = ContactSetting::first();
        
        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Contact settings not found',
            ], 404);
        }

        // Return only specific fields with success status
        return response()->json([
            'success' => true,
            'data' => [
                'title' => $settings->title,
                'address' => $settings->address,
                'phone' => $settings->phone,
                'email' => $settings->email,
                'working_hours' => $settings->working_hours,
            ]
        ]);
    }

    /**
     * Update contact settings (Admin only)
     */
    public function update(Request $request, ContactSetting $contactSetting)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'address' => 'sometimes|string',
            'phone' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'working_hours' => 'sometimes|string|max:255',
        ]);

        $contactSetting->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Contact settings updated successfully',
            'data' => [
                'title' => $contactSetting->title,
                'address' => $contactSetting->address,
                'phone' => $contactSetting->phone,
                'email' => $contactSetting->email,
                'working_hours' => $contactSetting->working_hours,
            ]
        ]);
    }
}