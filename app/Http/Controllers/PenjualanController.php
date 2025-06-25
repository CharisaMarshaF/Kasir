<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Http\Request;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penjualan.index');
    }
    public function data()
    { 
        $sale = Penjualan::with('member')->orderBy('id_sale', 'desc')->get();

        return datatables()
            ->of($sale)
            ->addIndexColumn()
            ->addColumn('total_item', function ($sale) {
                return format_uang($sale->total_item);
            })
            ->addColumn('total_harga', function ($sale) {
                return 'Rp. '. format_uang($sale->total_harga);
            })
            ->addColumn('bayar', function ($sale) {
                return 'Rp. '. format_uang($sale->bayar);
            })
            ->addColumn('tanggal', function ($sale) {
                return tanggal_indonesia($sale->created_at, false);
            })
            ->addColumn('kode_member', function ($sale) {
                $member = $sale->member->kode_member ?? '';
                return '<span class="label label-success">'. $member .'</spa>';
            })
            ->editColumn('diskon', function ($sale) {
                return $sale->diskon . '%';
            })
            ->editColumn('kasir', function ($sale) {
                return $sale->user->name ?? '';
            })
            ->addColumn('aksi', function ($sale) {
                return '
                <div class="btn-group">
                    <button onclick="showDetail(`'. route('penjualan.show', $sale->id_sale) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-eye"></i></button>
                    <button onclick="deleteData(`'. route('penjualan.destroy', $sale->id_sale) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_member'])
            ->make(true);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sale = new Penjualan();
        $sale->id_member = null;
        $sale->total_item = 0;
        $sale->total_harga = 0;
        $sale->diskon = 0;
        $sale->bayar = 0;
        $sale->diterima = 0;
        $sale->id_user = auth()->id();
        $sale->save();

        session(['id_sale' => $sale->id_sale]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale = Penjualan::findOrFail($request->id_sale);
        $sale->id_member = $request->id_member;
        $sale->total_item = $request->total_item;
        $sale->total_harga = $request->total;
        $sale->diskon = $request->diskon;
        $sale->bayar = $request->bayar;
        $sale->diterima = $request->diterima;
        $sale->update();

        $detail = PenjualanDetail::where('id_sale', $sale->id_sale)->get();
        foreach ($detail as $item) {
            $item->diskon = $request->diskon;
            $item->update();

            $produk = Produk::find($item->id_produk);
            $produk->stok -= $item->jumlah;
            $produk->update();
        }

        return redirect()->route('transaksi.selesai');
    }
// app/Http/Controllers/TransaksiController.php


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = PenjualanDetail::with('produk')->where('id_sale', $id)->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($detail) {
                return '<span class="badge badge-success">'. $detail->produk->kode_produk .'</span>';
            })
            ->addColumn('nama_produk', function ($detail) {
                return $detail->produk->nama_produk;
            })
            ->addColumn('harga_jual', function ($detail) {
                return 'Rp. '. format_uang($detail->harga_jual);
            })
            ->addColumn('jumlah', function ($detail) {
                return format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function ($detail) {
                return 'Rp. '. format_uang($detail->subtotal);
            })
            ->rawColumns(['kode_produk'])
            ->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Penjualan::find($id);
        $detail    = PenjualanDetail::where('id_sale', $sale->id_sale)->get();
        foreach ($detail as $item) {
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $produk->stok += $item->jumlah;
                $produk->update();
            }

            $item->delete();
        }

        $sale->delete();

        return redirect()->route('penjualan.index')->with('success', 'Pembelian dan detailnya berhasil dihapus.');
    }

    public function selesai()
    {
        $setting = Setting::first();

        return view('penjualan.selesai', compact('setting'));
    }

    public function notaKecil()
    {
        $setting = Setting::first();
        $sale = Penjualan::find(session('id_sale'));
        if (! $sale) {
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')
            ->where('id_sale', session('id_sale'))
            ->get();
        
        return view('penjualan.nota_kecil', compact('setting', 'sale', 'detail'));
    }
}
