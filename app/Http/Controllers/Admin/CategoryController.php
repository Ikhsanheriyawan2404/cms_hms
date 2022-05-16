<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        if (request()->ajax()) {
            $data = Category::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-flex justify-content-center">
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>
                        <form action="' . route('categories.destroy', $row->id) . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                            <button type="submit" data-id="'.$row->id.'" class="btn btn-danger btn-sm" id="deleteItem" onclick="return confirm(\'Are you sure want to delete this?\')"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.categories.index', [
            'title' => 'Data Kategori Post',
            'category' => $category,
        ]);
    }

    public function store()
    {
        Category::updateOrCreate(['id' => request('category_id')],
            ['name' => request('name'), 'slug' => Str::slug(request('name'))]);
    }

    public function edit(Category $category)
    {
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        toast('Data post berhasil dihapus!', 'success');
        return redirect()->back();
    }
}
