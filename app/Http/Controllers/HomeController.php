<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Models\Homepage;
use App\Models\AlbumVehicle;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryHeader;
use App\Models\ServiceHeader;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'title' => 'Dashboard',
            'homepages' => Homepage::all(),
            'abouts' => About::all(),
            'services' => Service::all(),
            'service_header' => ServiceHeader::find(1),
            'company_profile' => About::find(1),
            'visi_misi' => About::find(2),
            'album_vehicles' => AlbumVehicle::all(),
            'deliveries' => Delivery::all(),
            'delivery_header' => DeliveryHeader::find(1),
            'customers' => Customer::all(),
        ]);
    }

}
