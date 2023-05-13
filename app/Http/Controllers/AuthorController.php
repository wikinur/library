<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.author');
    }

    public function api()
    {
        $authors = Author::with('books')->get();

        // foreach ($authors as $key => $author) {
        //     $author->date = convert_date($author->created_at);
        // }
        $datatables = datatables()->of($authors)
            ->addColumn('date', function ($author) {
                return convert_date($author->created_at);
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:authors',
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);

        $author = Author::create($request->all());
        if ($author) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new author success!!');
        }
        return redirect('authors');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);

        $author->update($request->all());
        if ($author) {
            Session::flash('status', 'success');
            Session::flash('message', 'edit author success!!');
        }
        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
