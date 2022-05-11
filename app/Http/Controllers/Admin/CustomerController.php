<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $customers = Customer::latest()->get();
            return DataTables::of($customers)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <a href=" ' . route('customers.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>

                           <form action=" ' . route('customers.destroy', $row->id) . '" method="POST">
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

        return view('backend.customers.index', [
            'title' => ' Data Pelanggan',
        ]);
    }

    public function create()
    {
        return view('backend.customers.create',[
            'title' => 'Tambah Data Pelanggan',
            'customer' => new Customer()
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $request->validated();

        Customer::create([
            'company' => request('company'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
            'description' => request('description'),
            'image' => request('image') ? request()->file('image')->store('img/customers') : null,
        ]);

        toast('Data pelanggan berhasil dibuat!', 'success');
        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer)
    {
        return view('backend.customers.edit',[
            'title' => 'Edit Data customer',
            'customer' => $customer,
        ]);
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $request->validated();

        if (request('image')) {
            Storage::delete($customer->image);
            $image = request()->file('image')->store('img/customers');
        } else {
            $image = $customer->image;
        }

        $customer->update([
            'company' => request('company'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
            'description' => request('description'),
            'image' => $image,
        ]);

        toast('Data customer berhasil diedit!', 'success');
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        Storage::delete($customer->image);
        $customer->delete();
        toast('Data customer berhasil dihapus!', 'success');
        return redirect()->route('customers.index');
    }
}
