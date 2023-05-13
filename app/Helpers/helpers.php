<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
function convert_date($value)
{
    return date('H:i:s - d M Y', strtotime($value));
}

function over_returnDate()
{
    $notification = Transaction::with('member')->select('transactions.*', DB::raw('DATEDIFF(transactions.date_end, CURRENT_DATE) as late'))->where('status', 0)->get();

    return $notification;
}

function convert_date1($value)
{
    return date('d F Y', strtotime($value));
}

function convert_to_rupiah($number)
{
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($number)), 3)));
}

