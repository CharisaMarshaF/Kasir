<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand " href="{{ route('dashboard')}}">
            <img src="{{ url($setting->path_logo) }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                    aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder"
                                src="{{ url(auth()->user()->foto ?? '') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ route('user.profil')}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                
                    <div class="dropdown-divider"></div>
                    <a href="#!" class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="./assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <!-- Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link active" href="{{ route('dashboard')}}">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <span class="mx-4 text-muted font-weight-bold small text-black">---- MASTER ----</span>
                </li>
                @if (auth()->user()->level == 'admin')
                <!-- Produk -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.index')}}">
                        <i class="ni ni-box-2 text-blue"></i> Produk
                    </a>
                </li>
                <!-- Kategori -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index')}}">
                        <i class="ni ni-tag text-orange"></i> Kategori
                    </a>
                </li>
                <!-- Member -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('member.index')}}">
                        <i class="ni ni-circle-08 text-yellow"></i> Member
                    </a>
                </li>
                <!-- Supplier -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supplier.index')}}">
                        <i class="ni ni-shop text-green"></i> Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <span class="mx-4 text-muted font-weight-bold small text-black">---- TRANSAKSI ----</span>
                </li>
                <!-- Pengeluaran -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengeluaran.index')}}">
                        <i class="ni ni-credit-card text-red"></i> Pengeluaran
                    </a>
                </li>
                <!-- Pembelian -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pembelian.index')}}">
                        <i class="ni ni-cart text-info"></i> Pembelian
                    </a>
                </li>
                <!-- Penjualan -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penjualan.index')}}">
                        <i class="ni ni-credit-card text-pink"></i> Penjualan
                    </a>
                </li>
                <!-- Transaksi Aktif -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.index')}}">
                        <i class="ni ni-bullet-list-67 text-warning"></i> Transaksi Aktif
                    </a>
                </li>
                <!-- Transaksi Baru -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.baru')}}">
                        <i class="ni ni-cart text-success"></i> Transaksi Baru
                    </a>
                </li>
                <li class="nav-item">
                    <span class="mx-4 text-muted font-weight-bold small text-black">---- REPORT ----</span>
                </li>
                
                
                <!-- Laporan -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('laporan.index')}}">
                        <i class="ni ni-chart-pie-35 text-info"></i> Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <span class="mx-4 text-muted font-weight-bold small text-black">---- SYSTEM ----</span>
                </li>
                <!-- User -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index')}}">
                        <i class="ni ni-hat-3 text-primary"></i> User
                    </a>
                </li>
                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('setting.index')}}">
                        <i class="ni ni-settings-gear-65 text-dark"></i> Settings
                    </a>
                </li>
                @else
                <!-- Transaksi Aktif -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.index')}}">
                        <i class="ni ni-bullet-list-67 text-warning"></i> Transaksi Aktif
                    </a>
                </li>
                <!-- Transaksi Baru -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.baru')}}">
                        <i class="fa fa-shopping-cart text-success"></i> Transaksi Baru
                    </a>
                </li>
                
                @endif
            </ul>
        </div>
    </div>
</nav>
