<?php

namespace App\Http\Controllers;

use App\Models\{About, AboutHeader, Service, Vehicle, Customer, Delivery, Homepage, AlbumVehicle, Category, ServiceHeader, DeliveryHeader, VehicleHeader};

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'title' => 'Halaman Home',
            'homepages' => Homepage::all(),
            'abouts' => About::all(),
            'services' => Service::all(),
            'service_header' => ServiceHeader::find(1),
            'company_profile' => About::find(1),
            'visi_misi' => About::find(2),
            'album_vehicles' => AlbumVehicle::all(),
            'delivery_left' => Delivery::limit(5)->offset(0)->latest()->get(),
            'delivery_right' => Delivery::limit(5)->offset(5)->latest()->get(),
            'delivery_header' => DeliveryHeader::find(1),
            'categories' => Category::all(),
            'customers' => Customer::all(),
        ]);
    }

    public function about()
    {
        return view('frontend.about', [
            'title' => 'Halaman Tentang Kami',
            'abouts' => About::all(),
            'aboutBySlug' => new About(),
            'page_header' => AboutHeader::find(1),
            'customers' => Customer::all(),
        ]);
    }

    public function aboutDetails(About $about)
    {
        return view('frontend.about', [
            'title' => 'Halaman Tentang ' . $about->slug,
            'abouts' => About::all(),
            'aboutBySlug' => $about,
            'page_header' => AboutHeader::find(1),
            'customers' => Customer::all(),
        ]);
    }

    public function delivery()
    {
        return view('frontend.delivery', [
            'title' => 'Halaman Pengiriman',
            'delivery_left' => Delivery::limit(5)->offset(0)->latest()->get(),
            'delivery_right' => Delivery::limit(5)->offset(5)->latest()->get(),
            'page_header' => DeliveryHeader::find(1),
            'customers' => Customer::all(),
        ]);
    }

    public function vehicle()
    {
        return view('frontend.vehicle', [
            'title' => 'Halaman Kendaraan Kami',
            'vehicles' => Vehicle::all(),
            'customers' => Customer::all(),
            'page_header' => VehicleHeader::find(1),
            'album_vehicles' => AlbumVehicle::all(),
            'vehicles' => Vehicle::all()
        ]);
    }

    public function service()
    {
        return view('frontend.service', [
            'title' => 'Halaman Layanan',
            'services' => Service::all(),
            'customers' => Customer::all(),
            'page_header' => ServiceHeader::find(1),

        ]);
    }

    public function contact()
    {
        return view('frontend.contact', [
            'title' => "Halaman Kontak",
            'page_header' => AboutHeader::find(1),
            'customers' => Customer::all()
        ]);
    }

}
