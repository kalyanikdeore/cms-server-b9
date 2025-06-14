<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the active features for the frontend.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = WhyChooseUs::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return response()->json($features);
    }

    /**
     * Display all features for admin management.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $features = WhyChooseUs::orderBy('sort_order', 'asc')->get();
        return view('admin.why-choose-us.index', compact('features'));
    }

    /**
     * Show the form for creating a new feature.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    /**
     * Store a newly created feature in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon_class' => 'required|string|max:50',
            'icon_color' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        WhyChooseUs::create($validated);

        return redirect()->route('why-choose-us.index')
            ->with('success', 'Feature created successfully.');
    }

    /**
     * Display the specified feature.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        return view('admin.why-choose-us.show', compact('whyChooseUs'));
    }

    /**
     * Show the form for editing the specified feature.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified feature in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $validated = $request->validate([
            'icon_class' => 'required|string|max:50',
            'icon_color' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $whyChooseUs->update($validated);

        return redirect()->route('why-choose-us.index')
            ->with('success', 'Feature updated successfully');
    }

    /**
     * Remove the specified feature from storage.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();

        return redirect()->route('why-choose-us.index')
            ->with('success', 'Feature deleted successfully');
    }

    /**
     * Update the sort order of features
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $index => $id) {
            WhyChooseUs::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}