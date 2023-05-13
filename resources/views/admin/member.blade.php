@extends('layouts.admin')

@section('title', 'Member')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <div class="card-header mb-3 d-flex">
                    <a href="#" v-on:click="addData()" class="btn btn-primary btn-sm pull-right mr-auto">Create New Member</a>

                    <select name="gender" class="w-25">
                        <option value="0">All Gender</option>
                        <option value="L">Male</option>
                        <option value="P">Female</option>
                    </select>
                </div>

                @if(Session::has('status'))
                    <div class="alert alert-success offset-3 my-2" style="width:500px;">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Date Entry</th>
                                {{-- <th class="text-center">Total Books</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form :action="actionUrl" method="POST" autocomplete="off" @submit="submitForm($event, data.id)">
                <div class="modal-header">
                    <h4 class="modal-title">Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" :value="data.name" required>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" :value="data.gender">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="L">Male</option>
                                    <option value="P">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone number" placeholder="Enter phone number" :value="data.phone_number" required>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="5" placeholder="Enter your address" :value="data.address"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" :value="data.email" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->    
</div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('asset/dist/js/vue.min.js') }}"></script>
     <script src="{{ asset('asset/dist/js/axios.min.js') }}"></script>
    <script>
        var actionUrl = '{{ url('members') }}';
        var apiUrl = '{{ url('api/members') }}';

        var columns = [
            {data:'DT_RowIndex', class:'text-center', orderable:true},
            {data:'name', class:'text-center', orderable:true},
            {data:'gender', class:'text-center', orderable:true},
            {data:'phone_number', class:'text-center', orderable:true},
            {data:'address', class:'text-center', orderable:true},
            {data:'email', class:'text-center', orderable:true},
            {data:'date', class:'text-center', orderable:true},
            {render: function(index, row, data, meta){
                return `
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
            },orderable: false, width: '200px', class:'text-center'},
        ];
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
    <script>
    $('select[name=gender]').on('change', function() {
        gender = $('select[name=gender]').val()
        if (gender == 0) {
            controller.table.ajax.url(apiUrl).load()
        } else {
            controller.table.ajax.url(apiUrl + '?gender=' + gender).load()
        }
    })
    </script>
@endsection
