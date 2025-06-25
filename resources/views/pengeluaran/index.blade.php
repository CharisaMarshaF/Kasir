@extends('layouts.master')

@section('title')
Pengeluaran
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

                                    <button onclick="addForm('{{ route('pengeluaran.store') }}')"
                                        class="btn btn-icon btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                        <span class="btn-inner--text">Tambah Pengeluaran</span>
                                    </button>
                                </div>

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="pengeluaran-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" width="5%">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Nominal</th>
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
</div>

@includeIf('pengeluaran.form')
@endsection

@push('scripts')

<script>
    let table;

    $(function () {
    table = $('#pengeluaran-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('pengeluaran.data') }}',
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},    
            {data: 'created_at'},
            {data: 'deskripsi'},
            {data: 'nominal'},
            {data: 'aksi', searchable: false, sortable: false},
        ]
    });

        

       
    });



    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Member');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Member');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=deskripsi]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=deskripsi]').val(response.deskripsi);
                $('#modal-form [name=nominal]').val(response.nominal);

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
                        id_pengeluaran: selectedIds,  
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
