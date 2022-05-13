<?php

namespace App\Http\Controllers\Admin;

use App\Models\VehicleHeader;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VehicleHeaderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $vehicles = VehicleHeader::latest()->get();
            return DataTables::of($vehicles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                        <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>

                        </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.vehicles.index', [
            'title' => 'Data Kendaraan',
            'vehicle_header' => VehicleHeader::find(1)
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|max:255',
            'quote' => 'required|max:255',
            'keyword' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        VehicleHeader::updateOrCreate(
            ['id' => request('vehicle_header_id')],
            [
                'title' => request('title'),
                'quote' => request('quote'),
                'keyword' => request('keyword'),
                'description' => request('description'),
            ]
        );

        toast('Data vehicle header berhasil dibuat!', 'success');

        return back();
    }

    public function edit(VehicleHeader $vehicle_header)
    {
        return response()->json($vehicle_header);
    }

    public function updateImage(VehicleHeader $vehicle_header)
    {
        if (request('image')) {
            Storage::delete($vehicle_header->image);
            $image = request()->file('image')->store('img/vehicle_headers');
        } else {
            $image = $vehicle_header->image;
        }

        $vehicle_header->update([
            'image' => $image,
        ]);

        toast('Gambar vehicle header berhasil diupdate!', 'success');
        return redirect()->route('vehicle_header.index');
    }
}
