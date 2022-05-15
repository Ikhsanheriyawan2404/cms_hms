<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Service, Vehicle, Customer, Delivery};
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard', [
            'title' => 'Dashboard',
            'vehicles' => Vehicle::all(),
            'customers' => Customer::all(),
            'deliveries' => Delivery::all(),
            'services' => Service::all(),
        ]);
    }
}
