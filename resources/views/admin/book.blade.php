@extends('layouts.admin')

@section('title', 'Books')

@section('css')
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Create New Book</button>
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
        </div>

    <hr>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
                <div class="info-box" v-on:click="editData(book)">
                    <div class="info-box-content">
                        <span class="info-box-text h3">@{{ book.title }} ( @{{ book.qty }})</span>
                        <span class="info-box-number">Rp.@{{ numberWithSpaces(book.price) }},-</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="POST" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="number" class="form-control" name="isbn" :value="book.isbn" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" :value="book.title" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="number" class="form-control" name="year" :value="book.year" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Publisher</label>
                                        <select name="publisher_id" class="form-control">
                                            @foreach ($publishers as $publisher)
                                                <option v-bind:selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Author</label>
                                        <select name="author_id" class="form-control">
                                            @foreach ($authors as $author)
                                                <option v-bind:selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Catalog</label>
                                        <select name="catalog_id" class="form-control">
                                            @foreach ($catalogs as $catalog)
                                                <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Qty Stok</label>
                                        <input type="number" class="form-control" name="qty" :value="book.qty" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Pinjam</label>
                                        <input type="number" class="form-control" name="price" :value="book.price" required>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
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
    <script>
        var actionUrl = '{{ url('books') }}';
        var apiUrl = '{{ url('/api/books') }}';

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                book: {},
                editStatus: false,
                actionUrl,
                apiUrl,
            },
            mounted: function() {
                this.get_books();
            },
            methods: {
                get_books(){
                    const _this = this;
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function(data){
                            _this.books = JSON.parse(data);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                },
                addData(){
                    this.book = {};
                    this.actionUrl = '{{ url ('books') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(book){
                    this.book = book;
                    this.actionUrl = '{{ url ('books') }}' + '/' + book.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id){
                    // console.log(id);
                    const _this = this;
                    this.actionUrl = '{{ url('books') }}'+'/'+id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                            Swal.fire(
                            "Sukses",
                            "Hapus data berhasil",
                            "success"
                        );
                        });
                    }
                },
                numberWithSpaces(x) {
                   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            computed: {
                filteredList(){
                    return this.books.filter(book =>{
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    });
                }
            },
        });
    </script>
@endsection