<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use App\Models\AlbumVehicle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $vehicles = Vehicle::latest()->get();
            return DataTables::of($vehicles)
                ->addIndexColumn()
                ->addColumn('cmb', function (Vehicle $vehicle) {
                    return $vehicle->length * $vehicle->width * $vehicle->height / 1000000 . ' &#13221;';
                })
                ->addColumn('weight', function (Vehicle $vehicle) {
                    return $vehicle->weight . ' Ton';
                })
                ->editColumn('album_vehicle', function (Vehicle $vehicle) {
                    return $vehicle->album_vehicle->name;
                })
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                            <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>

                            <form action=" ' . route('vehicles.destroy', $row->id) . '" method="POST">
                               <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah yakin ingin menghapus ini?\')"><i class="fas fa-trash"></i></button>
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                           </form>
                        </div>';

                    return $btn;
                })
                ->rawColumns(['cmb', 'image', 'action'])
                ->make(true);
        }

        return view('backend.vehicles.index', [
            'title' => 'Data Kendaraan',
            'albums' => AlbumVehicle::all(),
            'vehicle' => new Vehicle(),
        ]);
    }

    public function store()
    {
        $id = request('vehicle_id');

        if ($id) {
            $vehicle = Vehicle::find($id);
            if (request('image')) {
                Storage::delete($vehicle->image);
                $image = request()->file('image')->store('img/vehicles');
            } else {
                $image = $vehicle->image;
            }
        } else {
            $image = request('image') ? request()->file('image')->store('img/vehicles') : null;
        }

        request()->validate([
            'name' => 'required|max:255',
            'length' => 'max:255',
            'width' => 'max:255',
            'height' => 'max:255',
            'weight' => 'max:255',
            'album_vehicle_id' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        Vehicle::updateOrCreate(
            ['id' => request('vehicle_id')],
            [
                'name' => request('name'),
                'length' => request('length'),
                'width' => request('width'),
                'height' => request('height'),
                'weight' => request('weight'),
                'description' => request('description'),
                'album_vehicle_id' => request('album_vehicle_id'),
                'image' => $image,
            ]);
    }

    public function edit(Vehicle $vehicle)
    {
        return response()->json($vehicle);
    }

    public function destroy(Vehicle $vehicle)
    {
        Storage::delete($vehicle->image);
        $vehicle->delete();
        toast('Data kendaraan berhasil dihapus!', 'success');
        return back();
    }
}
