@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card Stats Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow border-0">
                        <div class="card-body text-center">
                            <h1 class="display-4">Selamat Datang</h1>
                            <h2 class="">Anda login sebagai KASIR</h2>
                            <br><br>
                            <a href="{{ route('transaksi.baru') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center justify-content-xl-between">
            <div class="col-xl-6 text-center text-xl-left text-muted">
                <div class="copyright">
                    &copy; 2025 <a href="#" class="font-weight-bold ml-1" target="_blank">{{ config('app.name') }}</a>
                </div>
            </div>
            <div class="col-xl-6 text-center text-xl-right">
                <div class="footer-links">
                    <a href="#" class="text-muted mr-3">Privacy</a>
                    <a href="#" class="text-muted">Terms</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
