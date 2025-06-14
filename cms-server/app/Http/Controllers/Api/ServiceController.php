<?php
namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json(
            Service::where('is_active', true)
                ->orderBy('sort_order')
                ->get()
        );
    }
}