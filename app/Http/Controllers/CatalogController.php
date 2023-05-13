<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::with('books')->get();
        return view('admin.catalog.index', compact('catalogs'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        // $catalog = new Catalog;
        // $catalog->name = $request->name;
        // $catalog->save();
        try {
            $messages = [
                'required' => ':attribute wajib diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
            ];
            $this->validate($request, [
                'name' => 'required | min: 5',
            ], $messages);

            $this->message($request, ['name.required' => 'Nama Wajib diisi']);

            Catalog::create($request->all());
            Session::flash('status', 'success');
            Session::flash('message', 'add new catalog success!!');

        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        return redirect('catalogs');
    }

    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.edit', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $catalog->update($request->all());
        if ($catalog) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit catalog success!!');
        }
        return redirect('catalogs');
    }

    public function destroy(Catalog $catalog)
    {
        try {
            $catalog->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete catalog success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        return redirect('catalogs');
    }
}
