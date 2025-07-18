@extends('layouts.master')

@section('title')
Transaksi Pembelian
@endsection

@section('content')
<style>
.hide {
    display: none;
}
</style>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="box-header with-border">
                                    <table >
                                        <tr>
                                            <td>Supplier</td>
                                            <td>: {{ $supplier->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>: {{ $supplier->telepon }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: {{ $supplier->alamat }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-body">

                                    <form class="form-produk">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                                            <div class="col-lg-5">
                                                <div class="input-group">
                                                    <input type="hidden" name="id_pembelian" id="id_pembelian"
                                                        value="{{ $id_pembelian }}">
                                                    <input type="hidden" name="id_produk" id="id_produk">
                                                    <input type="text" class="form-control" name="kode_produk"
                                                        id="kode_produk">
                                                    <span class="input-group-btn">
                                                        <button onclick="tampilProduk()" class="btn btn-info btn-flat"
                                                            type="button"><i class="fa fa-arrow-right"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <table class="table table-stiped table-bordered table-pembelian">
                                        <thead>
                                            <th width="5%">No</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col" width="15%">Jumlah</th>
                                            <th scope="col">Subtotal</th>
                                            <th><i class="fa fa-cog"></i></th>
                                        </thead>
                                    </table>
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="tampil-bayar bg-primary"></div>
                                                    <div class="tampil-terbilang"></div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <form action="{{ route('pembelian.store') }}" class="form-pembelian"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="id_pembelian"
                                                            value="{{ $id_pembelian }}">
                                                        <input type="hidden" name="total" id="total">
                                                        <input type="hidden" name="total_item" id="total_item">
                                                        <input type="hidden" name="bayar" id="bayar">

                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div for="total" class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Total </span>
                                                                </div>
                                                                <input type="text" id="totalrp" class="form-control"
                                                                    placeholder="" aria-label="Username"
                                                                    aria-describedby="basic-addon1" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div for="diskon" class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Diskon </span>
                                                                </div>
                                                                <input type="number" name="diskon" id="diskon" class="form-control"
                                                                    placeholder="" aria-label=""
                                                                    aria-describedby="basic-addon1" value="{{ $diskon }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div for="bayar" class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Bayar </span>
                                                                </div>
                                                                <input type="text"  name="bayar" id="bayarrp" class="form-control"
                                                                    placeholder="" aria-label=""
                                                                    aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit"
                                                class="btn btn-primary pull-right btn-simpan"><i
                                                    class="fa fa-floppy-o"></i> Simpan Transaksi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@includeIf('pembelian_detail.produk')

@endsection

@push('scripts')
<script>
    let table, table2;

    $(function () {

        table = $('.table-pembelian').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian_detail.data', $id_pembelian) }}',
                dataSrc: function (json) {
                if (json.data) {
                    return json.data;
                }
                return []; //  array kosong
            },
            error: function (xhr, error, code) {
                console.error('Error fetching data:', error);
                alert('Terjadi kesalahan saat mengambil data');
            }
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
            paginate: false
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
        });
        table2 = $('.table-produk').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());

            if (jumlah < 1) {
                $(this).val(1);
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            }
            if (jumlah > 10000) {
                $(this).val(10000);
                alert('Jumlah tidak boleh lebih dari 10000');
                return;
            }

            $.post(`{{ url('/pembelian_detail') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': jumlah
                })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    });
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $(document).on('input', '#diskon', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('.btn-simpan').on('click', function () {
            $('.form-pembelian').submit();
        });
    });

    function tampilProduk() {
        $('#modal-produk').modal('show');
    }

    function hideProduk() {
        $('#modal-produk').modal('hide');
    }

    function pilihProduk(id, kode) {
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        hideProduk();
        tambahProduk();
    }

    function tambahProduk() {
        $.post('{{ route('pembelian_detail.store') }}', $('.form-produk').serialize())
            .done(response => {
                $('#kode_produk').focus();
                table.ajax.reload(() => loadForm($('#diskon').val()));
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function loadForm(diskon = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get(`{{ url('/pembelian_detail/loadform') }}/${diskon}/${$('.total').text()}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }
</script>
@endpush