@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">TotalKategori</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $kategori }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    
                                </div>

                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('kategori.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Produk</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $produk }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('produk.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Member</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $member }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('member.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Supplier</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $supplier }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('supplier.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">Grafik</h6>
                            <h2 class="text-white mb-0">Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }} </h2>
                        </div>
                        {{-- <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales"
                                    data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                    data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#chart-sales"
                                    data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                    data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                        <span class="d-none d-md-block">Week</span>
                                        <span class="d-md-none">W</span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-saless" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Total</h6>
                            <h2 class="mb-0">Penjualan Bulanan </h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-orderss" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2025 <a href="#" class="font-weight-bold ml-1"
                        target="_blank">{{ config('app.name')}}</a>
                </div>
            </div>
            \
        </div>
    </footer>
</div>
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('template/argon/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
<script>
    var dataTanggal = @json($data_tanggal); // Data tanggal per hari
    var dataPendapatan = @json($data_pendapatan); // Data pendapatan per hari

    // Grafik Pendapatan per Hari
    var ctxSales = document.getElementById('chart-saless').getContext('2d');
    var chartSales = new Chart(ctxSales, {
        type: 'line',  // Line chart untuk grafik pendapatan
        data: {
            labels: dataTanggal,  // X-axis: Tanggal
            datasets: [{
                label: 'Pendapatan',
                data: dataPendapatan,
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Grafik Total Orders per Bulan
var dataOrders = @json($data_orders);  // Data total orders per bulan
var ctxOrders = document.getElementById('chart-orderss').getContext('2d');
var chartOrders = new Chart(ctxOrders, {
    type: 'bar',  // Bar chart untuk total orders per bulan
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],  // Nama bulan
        datasets: [{
            label: 'Total Penjualan',
            data: dataOrders,  // Data orders per bulan
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true, // Agar grafik responsif
        maintainAspectRatio: false, // Agar ukuran bisa disesuaikan
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 14, // Ukuran font label sumbu X
                    },
                    padding: 10, // Jarak label sumbu X
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    font: {
                        size: 14, // Ukuran font label sumbu Y
                    },
                    padding: 10, // Jarak label sumbu Y
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 16, // Ukuran font label legenda
                    }
                }
            },
            tooltip: {
                titleFont: {
                    size: 14, // Ukuran font judul tooltip
                },
                bodyFont: {
                    size: 12, // Ukuran font isi tooltip
                }
            }
        }
    }
});

    
</script>

@endpush