<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupby('publisher_id')->orderby('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderby('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupby('publishers.name')->pluck('publishers.name');

        $label_bar = ['transactions', 'transaction_return'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60, 141, 138, 0.9)' : 'rgba(0, 0, 138, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;

                }
            }
            $data_bar[$key]['data'] = $data_month;
        }

        $data_member = ['member'];
        $member = [];

        foreach ($data_member as $key => $value) {
            $member[$key]['label'] = $data_member[$key];
            $member[$key]['backgroundColor'] = 'rgba(60, 141, 138, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                $data_month[] = Member::select(DB::raw("COUNT(*) as total"))->whereMonth('date_entry', $month)->first()->total;

            }
            $member[$key]['data'] = $data_month;
        }

        return view('admin.dashboard', compact('total_member', 'total_book', 'total_publisher', 'total_transaction', 'data_donut', 'label_donut', 'data_bar', 'member'));
    }

    public function test_spatie()
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'index transaction']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // Membuat Role
        // $user = auth()->user();
        // $user->assignRole('admin');
        // return $user;

        // $user = User::where('id', 4)->first();
        // $user->assignRole('admin');
        // return $user;

        // $user = User::with('roles')->get();
        // return $user;

        // Menghapus Role
        // $user = User::where('id', 4)->first();
        // $user->removeRole('admin');
    }
}
