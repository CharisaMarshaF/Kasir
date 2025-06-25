@extends('layouts.master')

@section('title')
Kategori
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

                                    <button onclick="addForm('{{ route('kategori.store') }}')"
                                        class="btn btn-icon btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                        <span class="btn-inner--text">Tambah Kategori</span>
                                    </button>
                                </div>

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="kategori-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data akan dimuat disini oleh DataTables -->
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

@includeIf('kategori.form')
@endsection

@push('scripts')

<script>
    let table;

    $(function () {
    table = $('#kategori-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('kategori.data') }}', 
            type: 'GET',
            dataType: 'json', 
            error: function(xhr, status, error) {
                console.log('Error: ' + status + ' - ' + error);  
            }
        },
        columns: [
            { data: 'DT_RowIndex', searchable: false, sortable: false },  
            { data: 'nama_kategori' }, 
            { data: 'aksi', searchable: false, sortable: false },  
        ],
        error: function(xhr, error, code) {
            console.log("Error loading data from server.");  
        }
    });
});


    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();
    }

    function editForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Edit Kategori');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#modal-form [name=_method]').val('put');
    $('#modal-form [name=nama_kategori]').focus();

    $.get(url)
        .done((response) => {
            console.log(response);  // respons di console
            if (response) {
                $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
            } else {
                alert('Data tidak ditemukan');
            }
        })
        .fail((errors) => {
            console.log(errors);  
            alert('Tidak dapat menampilkan data');
        });
    }

    
    function deleteData(url) {
    $('#delete-form').attr('action', url);
    
    $('#modal-notification').modal('show');
    }
    
</script>
@endpush