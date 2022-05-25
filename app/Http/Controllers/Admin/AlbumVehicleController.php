<?php

namespace App\Http\Controllers\Admin;

use App\Models\AlbumVehicle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AlbumVehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:vehicle-crud', ['only' => ['index', 'show', 'create', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $album_vehicle = AlbumVehicle::latest()->get();
            return DataTables::of($album_vehicle)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                            <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>

                            <form action=" ' . route('album_vehicle.destroy', $row->id) . '" method="POST">
                               <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah yakin ingin menghapus ini?\')"><i class="fas fa-trash"></i></button>
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                           </form>
                        </div>';

                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('backend.album_vehicle.index', [
            'title' => ' Data Album Vehicle',
        ]);
    }

    public function store()
    {
        $id = request('album_vehicle_id');

        if ($id) {
            $album_vehicle = AlbumVehicle::find($id);
            if (request('image')) {
                Storage::delete($album_vehicle->image);
                $image = request()->file('image')->store('img/album_vehicles');
            } else {
                $image = $album_vehicle->image;
            }
        } else {
            $image = request('image') ? request()->file('image')->store('img/album_vehicles') : null;
        }

        request()->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        AlbumVehicle::updateOrCreate(
            ['id' => request('album_vehicle_id')],
            [
                'name' => request('name'),
                'image' => $image,
            ]);
    }

    public function edit(AlbumVehicle $album_vehicle)
    {
        return response()->json($album_vehicle);
    }

    public function destroy(AlbumVehicle $album_vehicle)
    {
        Storage::delete($album_vehicle->image);
        $album_vehicle->delete();
        toast('Data album vehicle berhasil dihapus!', 'success');
        return back();
    }
}
