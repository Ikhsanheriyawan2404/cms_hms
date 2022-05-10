<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $abouts = About::latest()->get();
            return DataTables::of($abouts)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <a href=" ' . route('abouts.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>

                           <form action=" ' . route('abouts.destroy', $row->id) . '" method="POST">
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

        return view('backend.abouts.index', [
            'title' => ' Data About',
        ]);
    }

    public function create()
    {
        return view('backend.abouts.create',[
            'title' => 'Tambah Data About',
            'about' => new About()
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        About::create([
            'title' => request('title'),
            'contents' => request('contents'),
            'slug' => Str::slug(request('title')),
            'keyword' => request('keyword'),
            'image' => request('image') ? request()->file('image')->store('img/abouts') : null,
        ]);

        toast('Data about berhasil dibuat!', 'success');
        return redirect()->route('abouts.index');
    }

    public function edit(About $about)
    {
        return view('backend.abouts.edit',[
            'title' => 'Edit Data About',
            'about' => $about,
        ]);
    }

    public function update(About $about)
    {
        if (request('image')) {
            Storage::delete($about->image);
            $image = request()->file('image')->store('img/abouts');
        } else {
            $image = $about->image;
        }

        request()->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $about->update([
            'title' => request('title'),
            'contents' => request('contents'),
            'slug' => Str::slug(request('title')),
            'keyword' => request('keyword'),
            'image' => $image
        ]);

        toast('Data about berhasil diedit!', 'success');
        return redirect()->route('abouts.index');
    }

    public function destroy(About $about)
    {
        Storage::delete($about->image);
        $about->delete();
        toast('Data about berhasil dihapus!', 'success');
        return redirect()->route('abouts.index');
    }
}
