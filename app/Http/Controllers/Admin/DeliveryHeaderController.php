<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DeliveryHeaderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $delivery_header = DeliveryHeader::all();
            return DataTables::of($delivery_header)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-flex justify-content-center">
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.delivery_header.index', [
            'title' => 'Delivery Header',
            'delivery_header' => DeliveryHeader::find(1)
        ]);
    }

    public function store()
    {
        request()->validate([
            'quote' => 'required',
            'keyword' => 'required',
            'description' => 'required',
        ]);

        DeliveryHeader::updateOrCreate(
            [
                'id' => request('delivery_header_id')
            ],
            [
                'quote' => request('quote'),
                'keyword' => request('keyword'),
                'description' => request('description'),
            ]
        );

        toast('Data delivery header berhasil dibuat!', 'success');
        return back();
    }

    public function edit(DeliveryHeader $delivery_header)
    {
        return response()->json($delivery_header);
    }

    public function updateImage(DeliveryHeader $delivery_header)
    {
        if (request('image')) {
            Storage::delete($delivery_header->image);
            $image = request()->file('image')->store('img/delivery_headers');
        } else {
            $image = $delivery_header->image;
        }

        $delivery_header->update([
            'image' => $image,
        ]);

        toast('Gambar delivery header berhasil diupdate!', 'success');
        return redirect()->route('delivery_header.index');
    }
}
