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
        addData() {
            this.data = {};
            this.editStatus = false;
            $("#modal-default").modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            // console.log(this.data);
            this.editStatus = true;
            $("#modal-default").modal();
        },
        deleteData(event, id) {
            // console.log(id_member);
            const _this = this;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: true,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah kamu yakin?",
                    text: "Untuk menghapus data ini...",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $(event.target).parents("tr").remove();
                        axios
                            .post(this.actionUrl + "/" + id, {
                                _method: "DELETE",
                            })
                            .then((response) => {
                                _this.table.ajax.reload();
                                swalWithBootstrapButtons.fire(
                                    "Deleted!",
                                    "Data Berhasil di Hapus.",
                                    "success"
                                );
                            });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Hapus Data dibatalkan :)",
                            "error"
                        );
                    }
                });
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus
                ? this.actionUrl
                : this.actionUrl + "/" + id;
            axios
                .post(actionUrl, new FormData($(event.target)[0]))
                .then((response) => {
                    $("#modal-default").modal("hide");
                    _this.table.ajax.reload();
                    Swal.fire("Sukses", "Data Berhasil disimpan", "success");
                })
                .catch((err) => {
                    if (err) {
                        Swal.fire(
                            "Gagal",
                            "Periksa Kembali Data yang Anda masukkan",
                            "error"
                        );
                    }
                });
        },
    },
});
