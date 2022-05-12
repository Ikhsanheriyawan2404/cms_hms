<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceHeaderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $service_header = ServiceHeader::latest()->get();
            return DataTables::of($service_header)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center">
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.service_header.index', [
            'title' => 'Service Header',
            'service_header' => ServiceHeader::find(1)
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

        ServiceHeader::updateOrCreate(
            ['id' => request('service_header_id')],
            [
                'title' => request('title'),
                'quote' => request('quote'),
                'keyword' => request('keyword'),
                'description' => request('description'),
            ]
        );

        toast('Data service header berhasil dibuat!', 'success');

        return back();
    }

    public function edit(ServiceHeader $service_header)
    {
        return response()->json($service_header);
    }

    public function updateImage(ServiceHeader $service_header)
    {
        if (request('image')) {
            Storage::delete($service_header->image);
            $image = request()->file('image')->store('img/service_headers');
        } else {
            $image = $service_header->image;
        }

        $service_header->update([
            'image' => $image,
        ]);

        toast('Gambar service header berhasil diupdate!', 'success');
        return redirect()->route('service_header.index');
    }
}
