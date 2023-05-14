<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        return view('admin.book', compact('publishers', 'authors', 'catalogs'));
    }

    public function api()
    {
        $books = Book::all();
        return json_encode($books);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required',
            'title' => 'required',
            'year' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $book = Book::create($request->all());
        if ($book) {
            Session::flash('status', 'success');
            Session::flash('message', 'add buku success!!');
        }
        return redirect('books');

    }

    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'isbn' => ['required'],
            'title' => ['required'],
            'year' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'catalog_id' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
        ]);

        $book = $book->update($request->all());
        if ($book) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit book sukses');
        }
        return redirect('books');
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete catalog success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        return redirect('books');

    }
}
