@extends('layouts.master')

@section('title')
Daftar Pembelian
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

                                    <button onclick="addForm()" class="btn btn-icon btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                        <span class="btn-inner--text">Transaksi Baru</span>
                                    </button>
                                    @empty(! session('id_pembelian'))
                                    <a href="{{ route('pembelian_detail.index') }}"
                                        class="btn btn-info btn-xs btn-flat"><i class="fa fa-pencil"></i> Transaksi
                                        Aktif</a>
                                    @endempty

                                </div>

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="pembelian-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">
                                                    <input type="checkbox" name="select_all" id="select_all">
                                                </th>
                                                <th scope="col" width="5%">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Supplier</th>
                                                <th scope="col">Total Item</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Diskon</th>
                                                <th scope="col">Total Bayar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data DataTables -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer py-4">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
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

@includeIf('pembelian.supplier')
@includeIf('pembelian.detail')

@endsection

@push('scripts')

<script>
    let table;

    $(function () {
        table = $('#pembelian-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian.data') }}',
            },
            columns: [
                { 
                    data: 'select_all', 
                    searchable: false, 
                    sortable: false, 
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="select_item" value="' + row.id_pembelian + '">';
                    }
                },
                
                {data: 'DT_RowIndex', searchable: false, sortable: false},    
                {data: 'tanggal'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},

                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
        $('.table-supplier').DataTable();
            table1 = $('.table-detail').DataTable({
                processing: true,
                bSort: false,
                dom: 'Brt',
                columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'kode_produk'},
                    {data: 'nama_produk'},
                    {data: 'harga_beli'},
                    {data: 'jumlah'},
                    {data: 'subtotal'},
                ]
            })
    

        $('#select_all').on('click', function () {
            var isChecked = this.checked;

            $('.select_item').each(function () {
                $(this).prop('checked', isChecked);
            });
        });

        $('#member-table').on('change', '.select_item', function () {
            var totalCheckbox = $('.select_item').length;
            var checkedCheckbox = $('.select_item:checked').length;

            $('#select_all').prop('checked', totalCheckbox === checkedCheckbox);
        });
    });



    function addForm() {
        $('#modal-supplier').modal('show'); 
    }   
    function showDetail(url) {
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
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
                        id_pembelian: selectedIds,  
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

    
    
    
</script>
@endpush
