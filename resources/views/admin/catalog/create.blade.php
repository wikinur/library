@extends('layouts.admin')

@section('title', 'Create New Catalog')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/catalogs') }}" class="btn btn-primary btn-sm btn-flat"> Kembali</a>
                </div>
                <form action="{{ url('catalogs') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-flat">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection