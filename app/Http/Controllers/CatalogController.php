<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::with('books')->get();
        return view('admin.catalog.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        // $catalog = new Catalog;
        // $catalog->name = $request->name;
        // $catalog->save();

        $catalog = Catalog::create($request->all());
        if ($catalog) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new catalog success!!');
        }
        return redirect('catalogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $catalog->update($request->all());
        return redirect('catalogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect('catalogs');
    }
}
