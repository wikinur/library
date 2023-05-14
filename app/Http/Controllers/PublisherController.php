<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublisherController extends Controller
{
    public function index()
    {
        return view('admin.publisher');
    }

    public function api()
    {
        $publisher = Publisher::all();
        $datatables = datatables()->of($publisher)
            ->addColumn('date', function ($publisher) {
                return convert_date($publisher->created_at);

            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];

        $this->validate($request, [
            'name' => 'required|unique:publishers',
            'email' => 'required',
            'phone_number' => 'max:12',
        ], $messages);

        $publisher = Publisher::create($request->all());
        if ($publisher == 1) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add Publisher success!!');
        } else {
            Session::flash('gagal', 'error');
            Session::flash('message', 'Tambah Data gagal');
        }
        return redirect('publishers');
    }

    public function update(Request $request, Publisher $publisher)
    {
        try {
            $messages = [
                'required' => ':attribute wajib diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
            ];

            $this->validate($request, [
                'name' => 'required|unique:publishers',
                'email' => ['required'],
                'phone_number' => ['max:12'],
            ], $messages);

            $publisher->update($request->all());
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Publisher success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
            return redirect('publishers');
        }
    }

    public function destroy(Publisher $publisher)
    {
        try {
            $publisher->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete catalog success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        return redirect('publishers');
    }
}
