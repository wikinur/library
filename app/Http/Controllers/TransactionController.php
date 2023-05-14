<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        $listDate = Transaction::select('date_start')->orderby('date_start', 'desc')->distinct()->get();
        return view('admin.transaction.index', compact('listDate'));
        // if (auth()->user()->can('index transaction')) {
        //     $listDate = Transaction::select('date_start')->orderby('date_start', 'desc')->distinct()->get();
        //     return view('admin.transaction.index', compact('listDate'));
        // } else {
        //     return abort('403');
        // }
    }

    public function api(Request $request)
    {
        if ($request->status == '0' || $request->status == '1') {
            $transactions = Transaction::with('member', 'transactionDetails')
                ->select('transactions.*', DB::raw("SUM(transaction_details.qty) as total_books"), DB::raw("SUM(transaction_details.qty * books.price) as total_price"), DB::raw("DATEDIFF(date_end, date_start) as duration"))
                ->leftjoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'transaction_details.book_id', 'books.id')
                ->groupby('transaction_details.transaction_id')
                ->where('status', $request->status)
                ->get();
        } elseif ($request->date_start) {
            $transactions = Transaction::with('member', 'transactionDetails')
                ->select('transactions.*', DB::raw("SUM(transaction_details.qty) as total_books"), DB::raw("SUM(transaction_details.qty * books.price) as total_price"), DB::raw("DATEDIFF(date_end, date_start) as duration"))
                ->leftjoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'transaction_details.book_id', 'books.id')
                ->groupby('transaction_details.transaction_id')
                ->where('date_start', $request->date_start)
                ->get();
        } else {
            $transactions = Transaction::with('member', 'transactionDetails')
                ->select('transactions.*', DB::raw("SUM(transaction_details.qty) as total_books"), DB::raw("SUM(transaction_details.qty * books.price) as total_price"), DB::raw("DATEDIFF(date_end, date_start) as duration"))
                ->leftjoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'transaction_details.book_id', 'books.id')
                ->groupby('transaction_details.transaction_id')
                ->get();
        }

        $datatables = datatables()->of($transactions)
            ->addColumn('date_start', function ($transaction) {
                return convert_date1($transaction->date_start);
            })
            ->addColumn('date_end', function ($transaction) {
                return convert_date1($transaction->date_end);
            })
            ->addColumn('status', function ($transaction) {
                if ($transaction->status == 1) {
                    return "Returned";
                } else {
                    return "Borrowed";
                }
            })
            ->addColumn('total_price', function ($transaction) {
                return convert_to_rupiah($transaction->total_price);
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function create()
    {
        $member = Member::select('id', 'name')->orderby('name', 'asc')->get();
        $book = Book::select('id', 'title')->where('qty', '>', '0')->orderby('title', 'asc')->get();
        return view('admin.transaction.create', ['members' => $member, 'books' => $book]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate(
            [
                'member_id' => 'required',
                'date_start' => 'required|date',
                'date_end' => 'required|date|after:date_start',
                'book_id' => 'required',
            ]
        );

        $transaction = Transaction::create([
            'member_id' => $attributes['member_id'],
            'date_start' => $attributes['date_start'],
            'date_end' => $attributes['date_end'],
        ]);

        foreach ($attributes['book_id'] as $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $book_id,
                'qty' => 1,
            ]);

            Book::where('id', $book_id)->decrement('qty', 1);
        }
        Session::flash('status', 'success');
        Session::flash('message', 'add new transaction success!!');

        return redirect('transactions');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.detail', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $members = Member::select('id', 'name')->orderby('name', 'asc')->get();
        $books = Book::select('id', 'title')->where('qty', '>', '0')->orderby('title', 'asc')->get();
        $transaction_books = $transaction->transactionDetails()->pluck('book_id')->toArray();
        return view('admin.transaction.edit', compact('transaction', 'members', 'books', 'transaction_books'));

    }

    public function update(Request $request, Transaction $transaction)
    {
        $oldTransactionDetails = TransactionDetail::select('id', 'book_id')->where('transaction_id', $transaction->id)->get();

        $attributes = request()->validate([
            'member_id' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'book_id' => 'required',
            'status' => 'required',
        ]);

        $transaction->update([
            'member_id' => $attributes['member_id'],
            'date_start' => $attributes['date_start'],
            'date_end' => $attributes['date_end'],
            'status' => $attributes['status'],
        ]);

        if ($attributes['status'] == 1) {
            foreach ($attributes['book_id'] as $book_id) {
                $transactionDetail = TransactionDetail::updateOrCreate([
                    'book_id' => $book_id,
                    'transaction_id' => $transaction->id,
                    'qty' => 1,
                ]);

                if ($transactionDetail->wasRecentlyCreated) {
                    Book::where('id', $transactionDetail->book_id)->increment('qty', 1);
                }

                if (!$transactionDetail->wasRecentlyCreated && !$transactionDetail->wasChanged()) {
                    foreach ($oldTransactionDetails as $oldTransactionDetail) {
                        if ($transactionDetail->id != $oldTransactionDetail->id) {
                            TransactionDetail::where('id', $oldTransactionDetail->id)->delete();
                            Book::where('id', $oldTransactionDetail->book_id)->decrement('qty', 1);
                        }
                    }
                }
            }

        } else {
            foreach ($attributes['book_id'] as $book_id) {
                $transactionDetail = TransactionDetail::updateOrCreate([
                    'book_id' => $book_id,
                    'transaction_id' => $transaction->id,
                    'qty' => 1,
                ]);

                if ($transactionDetail->wasRecentlyCreated) {
                    Book::where('id', $transactionDetail->book_id)->decrement('qty', 1);
                }

                if (!$transactionDetail->wasRecentlyCreated && !$transactionDetail->wasChanged()) {
                    foreach ($oldTransactionDetails as $oldTransactionDetail) {
                        if ($transactionDetail->id != $oldTransactionDetail->id) {
                            TransactionDetail::where('id', $oldTransactionDetail->id)->delete();
                            Book::where('id', $oldTransactionDetail->book_id)->increment('qty', 1);
                        }
                    }
                }
            }
        }
        Session::flash('status', 'success');
        Session::flash('message', 'edit success!!');

        return redirect('transactions');
    }

    public function destroy(Transaction $transaction)
    {
        try {
            $transactionDetails = TransactionDetail::where('transaction_id', '=', $transaction->id)->get();

            if ($transaction->status == 1) {
                $transaction->delete();
                foreach ($transactionDetails as $transactionDetail) {
                    TransactionDetail::where('id', $transactionDetail->id)->delete();
                }
            } else {
                foreach ($transactionDetails as $transactionDetail) {
                    TransactionDetail::where('id', $transactionDetail->id)->delete();
                    Book::where('id', $transactionDetail->book_id)->increment('qty', 1);
                }
            }
            $transaction->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete transactions success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }

        return redirect('/transactions');
    }
}
