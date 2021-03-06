<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomepageRequest;
use App\Models\Homepage;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:homepage-crud', ['only' => ['index', 'show', 'create', 'edit', 'destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $homepages = Homepage::latest()->get();
            return DataTables::of($homepages)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <a href=" ' . route('homepages.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>

                           <form action=" ' . route('homepages.destroy', $row->id) . '" method="POST">
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

        return view('backend.homepages.index', [
            'title' => ' Data Homepage',
        ]);
    }


    public function create()
    {
        return view('backend.homepages.create', [
            'title' => ' Tambah Data Homepage',
            'homepage' => new Homepage(),
        ]);
    }

    public function store(HomepageRequest $request)
    {
        $request->validated();

        Homepage::create([
            'title' => request('title'),
            'sub_title' => request('sub_title'),
            'image' => request('image') ? request()->file('image')->store('img/homepages') : null,
        ]);

        toast('Data homepage berhasil dibuat!', 'success');
        return redirect()->route('homepages.index');
    }

    public function edit(Homepage $homepage)
    {
        return view('backend.homepages.edit', [
            'title' => ' Edit Data Homepage',
            'homepage' => $homepage,
        ]);
    }

    public function update(HomepageRequest $request, Homepage $homepage)
    {
        $request->validated();

        if (request('image')) {
            Storage::delete($homepage->image);
            $image = request()->file('image')->store('img/homepages');
        } else {
            $image = $homepage->image;
        }

        $homepage->update([
            'title' => request('title'),
            'sub_title' => request('sub_title'),
            'image' => $image,
        ]);

        toast('Data homepage berhasil diedit!', 'success');
        return redirect()->route('homepages.index');
    }

    public function destroy(Homepage $homepage)
    {
        Storage::delete($homepage->image);
        $homepage->delete();

        toast('Data homepage berhasil dihapus!', 'success');
        return redirect()->route('homepages.index');
    }
}
