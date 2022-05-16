<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $contacts = Contact::latest()->get();
            return DataTables::of($contacts)
                ->addIndexColumn()
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <form action=" ' . route('contacts.destroy', $row->id) . '" method="POST">
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

        return view('backend.contacts.index', [
            'title' => ' Contacts',
        ]);
    }

    public function store(ContactRequest $request)
    {
        $request->validated();

        Contact::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'messages' => request('messages'),
        ]);

        Alert::success('Berhasil', 'Terima kasih telah menghubungi kami');
        return redirect()->route('contact');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        toast('Data contact berhasil dihapus!', 'success');
        return redirect()->route('contacts.index');
    }
}
