<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Member;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Pengeluaran;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        $tanggal_awal = date('Y-m-01');
        $data_orders = [];
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $start_date = date('Y-', strtotime("first day of $bulan month")) . '01-01';
                $end_date = date('Y-', strtotime("first day of $bulan month")) . '01-31';

                $total_orders = Penjualan::whereMonth('created_at', $bulan)->whereYear('created_at', date('Y'))->count();
                $data_orders[] = $total_orders;
            }
        if (auth()->user()->level == 'admin') {
            return view('admin.dashboard', compact('kategori', 'produk', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan', 'data_orders'));
        } else {
            return view('kasir.dashboard');
        }
    }
}
