@extends('layouts.master')

@section('title')
Daftar Penjualan
@endsection

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fa fa-check-circle me-2"></i>
                                <span>Data Transaksi telah selesai.</span>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                @if ($setting->tipe_nota == 1)
                                <button class="btn btn-warning" onclick="notaKecil('{{ route('transaksi.nota_kecil') }}', 'Nota Kecil')">
                                    <i class="fa fa-print"></i> Cetak Ulang Nota
                                </button>
                                @else
                                <button class="btn btn-warning" onclick="notaBesar('{{ route('transaksi.nota_besar') }}', 'Nota PDF')">
                                    <i class="fa fa-file-pdf"></i> Cetak Ulang Nota
                                </button>
                                @endif

                                <a href="{{ route('transaksi.baru') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Transaksi Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Hapus cookie innerHeight untuk menghindari masalah tampilan
    document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    function notaKecil(url, title) {
        popupCenter(url, title, 625, 500);
    }

    function notaBesar(url, title) {
        popupCenter(url, title, 900, 675);
    }

    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !== undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth || document.documentElement.clientWidth || screen.width;
        const height = window.innerHeight || document.documentElement.clientHeight || screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left = (width - w) / 2 / systemZoom + dualScreenLeft;
        const top = (height - h) / 2 / systemZoom + dualScreenTop;
        const newWindow = window.open(url, title, `
            scrollbars=yes,
            width=${w / systemZoom}, 
            height=${h / systemZoom}, 
            top=${top}, 
            left=${left}
        `);

        if (window.focus) newWindow.focus();
    }
</script>
@endpush
