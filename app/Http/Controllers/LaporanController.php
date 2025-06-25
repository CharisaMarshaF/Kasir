<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tanggal_awal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggal_akhir = date('Y-m-d');

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && 
            $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggal_awal = $request->tanggal_awal;
            $tanggal_akhir = $request->tanggal_akhir;
        }

        return view('laporan.index', compact('tanggal_awal', 'tanggal_akhir'));
    }

    public function getdata($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $total_pendapatan = 0;

        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $total_penjualan = Penjualan::whereDate('created_at', $tanggal)->sum('bayar');
            $total_pembelian = Pembelian::whereDate('created_at', $tanggal)->sum('bayar');
            $total_pengeluaran = Pengeluaran::whereDate('created_at', $tanggal)->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $total_pendapatan += $pendapatan;

            $row = [
                'DT_RowIndex' => $no++,
                'tanggal' => date('d-m-Y', strtotime($tanggal)),
                'penjualan' => format_uang($total_penjualan),
                'pembelian' => format_uang($total_pembelian),
                'pengeluaran' => format_uang($total_pengeluaran),
                'pendapatan' => format_uang($pendapatan),
            ];

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'penjualan' => '',
            'pembelian' => '',
            'pengeluaran' => 'Total Pendapatan',
            'pendapatan' => format_uang($total_pendapatan),
        ];

        return $data;
    }

    public function data($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);

        return datatables()
            ->of($data)
            ->make(true);
    }

    public function exportPDF($awal, $akhir)
    {
        $data = $this->getdata($awal, $akhir);
        $pdf  = PDF::loadView('laporan.pdf', compact('awal', 'akhir', 'data'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan-Pendapatan-' . date('Y-m-d-His') . '.pdf');
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
