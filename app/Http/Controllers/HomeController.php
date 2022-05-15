<?php

namespace App\Http\Controllers;

use App\Models\AboutHeader;
use App\Models\{About, Service, Vehicle, Customer, Delivery, Homepage, AlbumVehicle, ServiceHeader, DeliveryHeader};

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

    public function about()
    {
        return view('frontend.about', [
            'title' => 'Halaman About Us',
            'abouts' => About::all(),
            'aboutBySlug' => new About(),
            'about_header' => AboutHeader::find(1),
        ]);
    }

    public function aboutDetails(About $about)
    {
        return view('frontend.about', [
            'title' => 'Halaman About ' . $about->slug,
            'abouts' => About::all(),
            'aboutBySlug' => $about,
            'about_header' => AboutHeader::find(1),
        ]);
    }

    public function delivery()
    {
        return view('frontend.delivery', [
            'title' => 'Halaman About Us',
            'deliveries' => Delivery::all(),
        ]);
    }

    public function vehicle()
    {
        return view('frontend.vehicle', [
            'title' => 'Halaman About Us',
            'vehicles' => Vehicle::all(),
        ]);
    }

    public function service()
    {
        return view('frontend.service', [
            'title' => 'Halaman About Us',
            'services' => Service::all(),
        ]);
    }

}
