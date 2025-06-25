@extends('layouts.master')

@section('title')
Supplier
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

                                    <button onclick="addForm('{{ route('supplier.store') }}')"
                                        class="btn btn-icon btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                        <span class="btn-inner--text">Tambah Supplier</span>
                                    </button>
                                </div>

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="supplier-table">
                                        <thead class="thead-light">
                                            <tr>

                                                <th scope="col" width="5%">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Telepon</th>
                                                <th scope="col">Aksi</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data oleh DataTables -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer py-4">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
                                            <!-- Pagination link -->
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

@includeIf('supplier.form')
@endsection

@push('scripts')

<script>
    let table;

    $(function () {
    table = $('#supplier-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('supplier.data') }}',
        },
        columns: [
            
            {data: 'DT_RowIndex', searchable: false, sortable: false},    
            {data: 'nama'},
            {data: 'alamat'},
            {data: 'telepon'},
            {data: 'aksi', searchable: false, sortable: false},
        ]
    });

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
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama);
                $('#modal-form [name=telepon]').val(response.telepon);
                $('#modal-form [name=alamat]').val(response.alamat);

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

    
    function cetakMember(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else {
            $('.form-member')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }


    
</script>
@endpush
