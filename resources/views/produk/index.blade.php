@extends('layouts.master')

@section('title')
Daftar Produk
@endsection

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="box-header with-border p-2">

                                    <button onclick="addForm('{{ route('produk.store') }}')"
                                        class="btn btn-icon btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Tambah Produk</span>
                                    </button>
                                    <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')"
                                        class="btn btn-icon btn-danger">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                        <span class="btn-inner--text">Hapus Produk</span>
                                    </button>
                                    <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')"
                                        class="btn btn-icon btn-info">
                                        <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
                                        <span class="btn-inner--text">Barcode</span>
                                    </button>
                                </div>

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <form action="" method="post" class="form-produk">
                                        @csrf
                                        <table class="table table-striped table-bordered" id="produk-table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th>

                                                    <th width="5%">No</th>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Merk</th>
                                                    <th scope="col">Harga Beli</th>
                                                    <th scope="col">Harga Jual</th>
                                                    <th scope="col">Diskon</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data akan dimuat disini oleh DataTables -->
                                            </tbody>
                                        </table>
                                    </form>
                                </div>

                                <div class="card-footer py-4">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
                                            <!-- Pagination links jika perlu -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@includeIf('produk.form')
@endsection

@push('scripts')

<script>
    let table;

    $(function () {
    table = $('#produk-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('produk.data') }}',
        },
        columns: [
            { 
                data: 'select_all', 
                searchable: false, 
                sortable: false, 
                render: function(data, type, row) {
                    return '<input type="checkbox" class="select_item" value="' + row.id_produk + '">';
                }
            },
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'kode_produk'},
            {data: 'nama_produk'},
            {data: 'nama_kategori'},
            {data: 'merk'},
            {data: 'harga_beli'},
            {data: 'harga_jual'},
            {data: 'diskon'},
            {data: 'stok'},
            {data: 'aksi', searchable: false, sortable: false},
        ]
    });

        $('#select_all').on('click', function () {
            var isChecked = this.checked;

            $('.select_item').each(function () {
                $(this).prop('checked', isChecked);
            });
        });

        $('#produk-table').on('change', '.select_item', function () {
            var totalCheckbox = $('.select_item').length;
            var checkedCheckbox = $('.select_item:checked').length;

            $('#select_all').prop('checked', totalCheckbox === checkedCheckbox);
        });
    });



    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli]').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }


    
    function deleteData(url) {
        $('#delete-form').attr('action', url);
        
        $('#modal-notification').modal('show');
        }
        function deleteSelected(url) {
        var selectedIds = [];
        $('.select_item:checked').each(function () {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id_produk: selectedIds,  
                        _token: $('meta[name="csrf-token"]').attr('content')  
                    },
                    success: function(response) {
                        table.ajax.reload();
                    },
                    error: function(errors) {
                        alert('Tidak dapat menghapus data');
                        return;
                    }
                });
            }
        } else {
            alert('Pilih data yang akan dihapus');
            return;
        }
    }

    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else if ($('input:checked').length < 3) {
            alert('Pilih minimal 3 data untuk dicetak');
            return;
        } else {
            $('.form-produk')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }


    
</script>
@endpush
