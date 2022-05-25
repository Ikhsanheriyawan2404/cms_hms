<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delivery;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:delivery-crud', ['only' => ['index', 'show', 'create', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $deliveries = Delivery::latest()->get();
            return DataTables::of($deliveries)
                ->addIndexColumn()
                ->addColumn('customer', function (Delivery $delivery) {
                    return $delivery->customer->company;
                })
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <a href=" ' . route('deliveries.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>

                           <form action=" ' . route('deliveries.destroy', $row->id) . '" method="POST">
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

        return view('backend.deliveries.index', [
            'title' => ' Delivery / Pengiriman',
        ]);
    }

    public function create()
    {
        return view('backend.deliveries.create',[
            'title' => 'Tambah Data Delivery',
            'delivery' => new Delivery(),
            'customers' => Customer::all(),
        ]);
    }

    public function store(DeliveryRequest $request)
    {
        $request->validated();

        Delivery::create([
            'title' => request('title'),
            'description' => request('description'),
            'customer_id' => request('customer_id'),
            'image' => request('image') ? request()->file('image')->store('img/deliveries') : null,
        ]);

        toast('Data delivery berhasil dibuat!', 'success');
        return redirect()->route('deliveries.index');
    }

    public function edit(Delivery $delivery)
    {
        return view('backend.deliveries.edit',[
            'title' => 'Edit Data Delivery',
            'delivery' => $delivery,
            'customers' => Customer::all(),
        ]);
    }

    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $request->validated();

        if (request('image')) {
            Storage::delete($delivery->image);
            $image = request()->file('image')->store('img/deliveries');
        } else {
            $image = $delivery->image;
        }

        $delivery->update([
            'title' => request('title'),
            'contents' => request('contents'),
            'keyword' => request('keyword'),
            'image' => $image
        ]);

        toast('Data delivery berhasil diedit!', 'success');
        return redirect()->route('deliveries.index');
    }

    public function destroy(Delivery $delivery)
    {
        Storage::delete($delivery->image);
        $delivery->delete();
        toast('Data delivery berhasil dihapus!', 'success');
        return redirect()->route('deliveries.index');
    }
}
