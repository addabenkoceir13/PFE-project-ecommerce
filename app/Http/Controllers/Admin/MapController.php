<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('Admin.Map.index', compact('suppliers'));
    }
}
