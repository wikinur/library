@extends('layouts.admin')

@section('title', 'catalog')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
@if(Session::has('status'))
    <script>Swal.fire('Sukses', '{{ Session::get('message') }}', 'success')</script>
@endif
@if(Session::has('gagal'))
    <script>Swal.fire('gagal', '{{ Session::get('message') }}', 'error')</script>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="card-header mb-3">
                <a href="{{ url('catalogs/create') }}" class="btn btn-primary btn-sm btn-flat">Create New Catalog</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped table-bordered" id="tableData">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center" width="20%">Name</th>
                            <th class="text-center" width="10%">Total Books</th>
                            <th class="text-center" width="20%">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catalogs as $catalog)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $catalog->name }}</td>
                                <td class="text-center">{{ count($catalog->books) }}</td>
                                <td class="text-center">{{ convert_date($catalog->created_at) }}</td>
                                <td class="text-center text-white">
                                    <div class="d-flex alig-items-center justify-content-center">
                                        <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a> &nbsp;
                                        <form action="{{ url('catalogs',['id' => $catalog->id]) }}" method="post">
                                            <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are yoou sure?')">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        let table;
        $(function () {
            table = $('#tableData').DataTable({
                processing: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
@endsection