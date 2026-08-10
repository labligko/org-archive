<?php

namespace App\Http\Controllers;

use App\Models\Period;

class HomeController extends Controller
{
    public function index()
    {
        $period = Period::with([
            'cabinet.organizationalUnits',
        ])
        ->where('is_active', true)
        ->first();

        return view('home', compact('period'));
    }
}