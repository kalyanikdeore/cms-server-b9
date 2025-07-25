<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TreatmentComparison;
use Illuminate\Http\Request;

class TreatmentComparisonController extends Controller
{
    public function index()
    {
        $comparison = TreatmentComparison::where('is_active', true)
            ->orderBy('sort_order')
            ->first();

        return response()->json($comparison);
    }
}