<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Membuat Relasi
        // $members = Member::with('user')->get();
        // $books = Book::with('publisher')->get();
        // $publishers = Publisher::with('books')->get();
        // $books = Book::with('author')->get();
        // $author = Author::with('books')->get();
        // $books = Book::with('catalog')->get();
        // $catalog = Catalog::with('books')->get();

        // Query Builder
        // No 1
        $data = Member::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();

        // No 2
        $data2 = Member::select('*')
            ->leftjoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', null)
            ->get();

        // No 3
        $data3 = Member::select('members.id', 'members.name')
            ->leftjoin('transactions', 'members.id', 'transactions.member_id')
            ->where('transactions.member_id', null)
            ->get();

        // No 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->get();

        // No 5 belum
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->groupBy('transaction_details.transaction_id')
            ->havingRaw('count(transaction_details.transaction_id > ?)', [1])
            ->get();

        // No 6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_end')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->get();

        // No 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->whereMonth('transactions.date_end', '=', 06)
            ->get();

        // No 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->whereMonth('transactions.date_start', '=', 05)
            ->get();

        // No 9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->whereMonth('transactions.date_start', '=', 06)
            ->whereMonth('transactions.date_end', '=', 06)
            ->get();

        // No 10
        $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->leftjoin('transactions', 'members.id', 'transactions.member_id')
            ->where('address', 'LIKE', '%Bandung%')
            ->get();

        // No 11
        $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->leftjoin('transactions', 'members.id', 'transactions.member_id')
            ->where('address', 'LIKE', '%Bandung%')
            ->orwhere('gender', 'LIKE', '%p%')
            ->get();

        // No 12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.title', 'books.title')
            ->where('transaction_details.qty', '>', 1)
            ->get();

        // No 13
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'price', DB::raw('books.qty * price as total'))
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->get();

        // No 14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->join('publishers', 'books.publisher_id', 'publishers.id')
            ->join('authors', 'books.author_id', 'authors.id')
            ->join('catalogs', 'books.catalog_id', 'catalogs.id')
            ->get();

        // No 15
        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')
            ->join('books', 'books.catalog_id', 'catalogs.id')
            ->orderBy('catalogs.id', 'asc')
            ->get();

        // No 16
        $data16 = Book::select('books.*', 'publishers.name')
            ->leftjoin('publishers', 'books.publisher_id', 'publishers.id')
            ->get();

        // No 17
        $data17 = Book::select('books.*', 'authors.name')
            ->join('authors', 'books.author_id', 'authors.id')
            ->where('books.author_id', '5')
            ->get();

        // No 18
        $data18 = Book::select('*')
            ->where('books.price', '>', 10000)
            ->get();

        // No 19
        $data19 = Book::select('*')
            ->join('publishers', 'books.publisher_id', 'publishers.id')
            ->where('books.publisher_id', '1')
            ->orwhere('books.qty', '>', 10)
            ->get();

        // No 20
        $data20 = Member::select('*')
            ->whereMonth('date_entry', 06)
            ->get();

        // return $data5;
        return view('admin.dashboard');
    }
}
