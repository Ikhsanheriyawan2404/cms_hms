<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Homepage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard', [
            'title' => 'Dashboard',
            'homepages' => Homepage::all(),
        ]);
    }
}
