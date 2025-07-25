<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DepartmentProcess;
use Illuminate\Http\Request;

class DepartmentProcessController extends Controller
{
    public function index()
    {
        $departments = DepartmentProcess::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json($departments);
    }
}