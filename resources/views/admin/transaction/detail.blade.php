@extends('layouts.admin')

@section('title', 'Detail Transaction')

@section('content')
    <div id="controller" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('transactions') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"> Kembali</i></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Peminjam :</th>
                            <td>{{ $transaction->member->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pinjam:</th>
                            <td>{{ convert_date1($transaction->date_start) }}</td>
                        </tr>
                        <tr>
                        <th>Buku:</th>
                            <td>
                                @foreach ($transaction->TransactionDetails as $transactionDetail)
                                <ul>
                                    <li>{{ $transactionDetail->books->title }}</li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ $transaction->status == 1 ? 'Returned' : 'Borrowed' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection