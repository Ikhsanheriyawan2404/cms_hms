<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $services = Service::latest()->get();
            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <a href=" ' . route('services.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>

                           <form action=" ' . route('services.destroy', $row->id) . '" method="POST">
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

        return view('backend.services.index', [
            'title' => ' Data service',
        ]);
    }

    public function create()
    {
        return view('backend.services.create',[
            'title' => 'Tambah Data service',
            'service' => new Service()
        ]);
    }

    public function store(ServiceRequest $request)
    {
        $request->validated();

        Service::create([
            'title' => request('title'),
            'contents' => request('contents'),
            'image' => request('image') ? request()->file('image')->store('img/services') : null,
        ]);

        toast('Data service berhasil dibuat!', 'success');
        return redirect()->route('services.index');
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit',[
            'title' => 'Edit Data service',
            'service' => $service,
        ]);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $request->validated();

        if (request('image')) {
            Storage::delete($service->image);
            $image = request()->file('image')->store('img/services');
        } else {
            $image = $service->image;
        }

        $service->update([
            'title' => request('title'),
            'contents' => request('contents'),
            'image' => $image
        ]);

        toast('Data service berhasil diedit!', 'success');
        return redirect()->route('services.index');
    }

    public function destroy(Service $service)
    {
        Storage::delete($service->image);
        $service->delete();
        toast('Data service berhasil dihapus!', 'success');
        return redirect()->route('services.index');
    }
}
