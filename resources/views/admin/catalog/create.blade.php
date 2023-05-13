@extends('layouts.admin')

@section('title', 'Create New Catalog')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('catalogs') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection