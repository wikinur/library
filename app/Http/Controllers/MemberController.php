<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeUnit\Exception;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.member');
    }

    public function api(Request $request)
    {
        // $members = Member::all();
        // $datatables = datatables()->of($members)
        //     ->addColumn('date', function ($members) {
        //         return convert_date($members->created_at);

        //     })
        //     ->addIndexColumn();

        // return $datatables->make(true);
        if ($request->gender) {
            $members = Member::where('gender', $request->gender)->get();
        } else {
            $members = Member::all();
        }

        $datatables = datatables()->of($members)
            ->addColumn('date', function ($members) {
                return convert_date($members->created_at);
            })
            ->addIndexColumn();
        return $datatables->make(true);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        $member = Member::create($request->all());
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new author success!!');
        }

        return redirect('members');
    }

    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'gender' => 'required',
            'email' => 'required|email|max:64',
            'phone_number' => 'required|max:14',
            'address' => 'required',
        ]);

        $member->update($request->all());
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new author success!!');
        }

        return redirect('members');
    }

    public function destroy(Member $member)
    {
        try {
            $member->delete();
            Session::flash('status', 'success');
            Session::flash('message', 'Delete catalog success!!');
        } catch (Exception $e) {
            Session::flash('gagal', 'error');
            Session::flash('message', $e->getMessage());
        }
        $member->delete();
    }
}
