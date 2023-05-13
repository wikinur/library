@extends('layouts.admin')

@section('title', 'Edit New Catalog')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/catalogs') }}" class="btn btn-primary btn-sm btn-flat"> Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('catalogs/'.$catalog->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $catalog->name }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection