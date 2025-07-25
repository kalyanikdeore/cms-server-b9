<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CtaSection;
use Illuminate\Http\Request;

class CtaSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ctaSections = CtaSection::all();
        return view('admin.cta-sections.index', compact('ctaSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cta-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'badge_text' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'overlay_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disclaimer' => 'required|string',
            'results_note' => 'required|string',
            'is_active' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('cta-section', 'public');
        }

        if ($request->hasFile('overlay_image')) {
            $validated['overlay_image'] = $request->file('overlay_image')->store('cta-section', 'public');
        }

        CtaSection::create($validated);

        return redirect()->route('cta-sections.index')->with('success', 'CTA section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CtaSection $ctaSection)
    {
        return view('admin.cta-sections.show', compact('ctaSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CtaSection $ctaSection)
    {
        return view('admin.cta-sections.edit', compact('ctaSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CtaSection $ctaSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'badge_text' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'overlay_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disclaimer' => 'required|string',
            'results_note' => 'required|string',
            'is_active' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('background_image')) {
            // Delete old image
            if ($ctaSection->background_image) {
                Storage::disk('public')->delete($ctaSection->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('cta-section', 'public');
        }

        if ($request->hasFile('overlay_image')) {
            // Delete old image
            if ($ctaSection->overlay_image) {
                Storage::disk('public')->delete($ctaSection->overlay_image);
            }
            $validated['overlay_image'] = $request->file('overlay_image')->store('cta-section', 'public');
        }

        $ctaSection->update($validated);

        return redirect()->route('cta-sections.index')->with('success', 'CTA section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CtaSection $ctaSection)
    {
        // Delete associated files
        if ($ctaSection->background_image) {
            Storage::disk('public')->delete($ctaSection->background_image);
        }
        if ($ctaSection->overlay_image) {
            Storage::disk('public')->delete($ctaSection->overlay_image);
        }

        $ctaSection->delete();

        return redirect()->route('cta-sections.index')->with('success', 'CTA section deleted successfully.');
    }

    /**
     * Get the active CTA section for frontend display
     */
    public function getActiveCta()
    {
        $ctaSection = CtaSection::where('is_active', true)->first();
        return response()->json($ctaSection);
    }
}