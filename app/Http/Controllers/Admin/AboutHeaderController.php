<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutHeader;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutHeaderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $about_header = AboutHeader::all();
            return Datatables::of($about_header)
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

        return view('backend.about_header.index', [
            'title' => 'About Header',
            'about_header' => AboutHeader::find(1)
        ]);
    }

    public function store()
    {
        request()->validate([
            'quote' => 'required',
            'keyword' => 'required',
            'description' => 'required',
        ]);

        AboutHeader::updateOrCreate(
            ['id' => request('about_header_id')],
            [
                'quote' => request('quote'),
                'keyword' => request('keyword'),
                'description' => request('description'),
            ]
        );
    }

    public function edit(AboutHeader $about_header)
    {
        return response()->json($about_header);
    }

    public function updateImage(AboutHeader $about_header)
    {
        if (request('image')) {
            Storage::delete($about_header->image);
            $image = request()->file('image')->store('img/about_headers');
        } else {
            $image = $about_header->image;
        }

        $about_header->update([
            'image' => $image,
        ]);

        toast('Gambar about header berhasil diupdate!', 'success');
        return redirect()->route('about_header.index');
    }
}
