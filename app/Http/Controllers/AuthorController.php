<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
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

    public function destroy(Author $author)
    {
        try {
            $author->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete catalog success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        return redirect('publishers');
    }
}
