@extends('layouts.admin')

@section('title', 'Transaction')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')

{{-- @can('index transaction') --}}
@role('admin')
<div id="controller">
            <div class="card p-3">
                <div class="card-header mb-3 d-flex">
                    <a href="{{ url('/transactions/create') }}" class="btn btn-primary btn-sm pull-right mr-auto">Add Transaction</a>
                    <select name="status" class="bg-dark">
                        <option value="2">All Status</option>
                        <option value="0">Borrowed</option>
                        <option value="1">Returned</option>
                    </select>
                    &nbsp;
                    <select name="date_start" class="bg-dark">
                        <option value="">Choose Borrowed Date</option>
                        @foreach ($listDate as $date)
                            <option value="{{ $date->date_start}}">{{ $date->date_start }}</option>
                        @endforeach
                    </select>
                </div>
                @if(Session::has('status'))
                    <script>Swal.fire('Sukses', '{{ Session::get('message') }}', 'success')</script>
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
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Name</th>
                                <th>Duration(day)</th>
                                <th>Total Books</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
</div>
@endrole
{{-- @endcan --}}
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
        var actionUrl = '{{ url('transactions') }}';
        var apiUrl = '{{ url('api/transactions') }}';

        var columns = [
            // {data:'DT_RowIndex', class:'text-center', orderable:true},
            {data:'date_start', class:'text-center', orderable:true},
            {data:'date_end', class:'text-center', orderable:true},
            {data:'member.name', class:'text-center', orderable:true},
            {data:'duration', class:'text-center', orderable:true},
            {data:'total_books', class:'text-center', orderable:true},
            {data:'total_price', class:'text-center', orderable:true},
            {data:'status', class:'text-center', orderable:true},
            {render: function(index, row, data, meta){
                return `
                    <div class="d-flex align-items-center-justify-content-beetwen">
                        <a href="/transactions/${data.id}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fas fa-eye fa-sm text-white-50"></i></a>
                        <a href="{{ url('/transactions/${data.id}/edit') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                        <form action="/transactions/${data.id}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure?');" type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button>
                        </form>
                    </div>`
            },orderable: false, width: '200px', class:'text-center'},
        ];
    </script>
    <script>
        var controller = new Vue({
            el: "#controller",
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function () {
                this.data_table();
            },
            methods: {
                data_table() {
                    const _this = this;
                    _this.table = $("#datatable")
                        .DataTable({
                            ajax: {
                                url: _this.apiUrl,
                                type: "GET",
                            },
                            columns: columns,
                        })
                        .on("xhr", function () {
                            _this.datas = _this.table.ajax.json().data;
                        });
                },
            },
        });
    </script>
    <script>
    $('select[name=status]').on('change', function() {
        status = $('select[name=status]').val()
        if (status == 2) {
            controller.table.ajax.url(apiUrl).load()
        } else {
            controller.table.ajax.url(apiUrl + '?status=' + status).load()
        }
    })

    $('select[name=date_start]').on('change', function() {
	    date_start = $('select[name=date_start]').val()
	    controller.table.ajax.url(apiUrl + '?date_start=' + date_start).load()
	});
    </script>
@endsection
