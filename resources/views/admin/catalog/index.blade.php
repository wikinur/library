@extends('layouts.admin')

@section('title', 'catalog')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('catalogs/create') }}" class="btn btn-primary">Create New Catalog</a>
        </div>
        @if(Session::has('status'))
            <div class="alert alert-success offset-3 my-2" style="width:500px;">
                {{ Session::get('message') }}
            </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
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
                                <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('catalogs',['id' => $catalog->id]) }}" method="post">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are yoou sure?')">
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
          <!-- /.card-body -->
    </div>
@endsection