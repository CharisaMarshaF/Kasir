<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Models\Produk;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // variabel yang ada
        $supplier = Supplier::orderBy('nama')->get();
        return view('pembelian.index', compact('supplier'));
    }

    public function data()
    {
        $pembelian = Pembelian::orderBy('id_pembelian', 'desc')->get();

        return datatables()
            ->of($pembelian)
            ->addIndexColumn()
            ->addColumn('total_item', function ($pembelian) {
                return format_uang($pembelian->total_item);
            })
            ->addColumn('total_harga', function ($pembelian) {
                return 'Rp. '. format_uang($pembelian->total_harga);  // Menambahkan simbol Rp di tampilan
            })
            ->addColumn('bayar', function ($pembelian) {
                return 'Rp. '. format_uang($pembelian->bayar);  // Menambahkan simbol Rp di tampilan
            })
            ->addColumn('tanggal', function ($pembelian) {
                return tanggal_indonesia($pembelian->created_at, false);
            })
            ->addColumn('supplier', function ($pembelian) {
                return $pembelian->supplier->nama;
            })
            ->editColumn('diskon', function ($pembelian) {
                return $pembelian->diskon . '%';
            })
            ->addColumn('aksi', function ($pembelian) {
                return '
                <div class="btn-group">
                    <button onclick="showDetail(`'. route('pembelian.show', $pembelian->id_pembelian) .'`)" class="btn btn-xs btn-info btn-flat">Detail</button>
                    <button onclick="deleteData(`'. route('pembelian.destroy', $pembelian->id_pembelian) .'`)" class="btn btn-xs btn-danger btn-flat">Hapus</button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $pembelian = new Pembelian();
        $pembelian->id_supplier = $id;
        $pembelian->total_item  = 0;
        $pembelian->total_harga = 0;
        $pembelian->diskon      = 0;
        $pembelian->bayar       = 0;
        $pembelian->save();

        session(['id_pembelian' => $pembelian->id_pembelian]);
        session(['id_supplier' => $pembelian->id_supplier]);

        return redirect()->route('pembelian_detail.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        

        $pembelian = Pembelian::findOrFail($request->id_pembelian);

        // Menghapus simbol "Rp." dan titik dari inputan
        $total_harga = str_replace(['Rp.', '.'], '', $request->total);
        $bayar = str_replace(['Rp.', '.'], '', $request->bayar);

        // Pastikan menjadi angka yang sesuai
        $pembelian->total_item = $request->total_item;
        $pembelian->total_harga = (int) $total_harga;
        $pembelian->diskon = $request->diskon;
        $pembelian->bayar = (int) $bayar;
        $pembelian->update();

        // Update stok produk
        $detail = PembelianDetail::where('id_pembelian', $pembelian->id_pembelian)->get();
        foreach ($detail as $item) {
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $produk->stok += $item->jumlah;
                $produk->update();
            }
        }

        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = PembelianDetail::with('produk')->where('id_pembelian', $id)->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($detail) {
                return '<span class="label label-success">'. $detail->produk->kode_produk .'</span>';
            })
            ->addColumn('nama_produk', function ($detail) {
                return $detail->produk->nama_produk;
            })
            ->addColumn('harga_beli', function ($detail) {
                return format_uang($detail->harga_beli);  // Tidak menambahkan Rp. di dalam format_uang()
            })
            ->addColumn('jumlah', function ($detail) {
                return format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function ($detail) {
                return format_uang($detail->subtotal);  // Tidak menambahkan Rp. di dalam format_uang()
            })
            ->rawColumns(['kode_produk'])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    // Mencari pembelian berdasarkan ID
    $pembelian = Pembelian::find($id);
    // Cek apakah pembelian ditemukan
    if (!$pembelian) {
        return redirect()->route('pembelian.index')->with('error', 'Pembelian tidak ditemukan.');
    }

    // Mendapatkan detail pembelian berdasarkan ID pembelian
    $detail = PembelianDetail::where('id_pembelian', $pembelian->id_pembelian)->get();

    foreach ($detail as $item) {
        $produk = Produk::find($item->id_produk);

        if ($produk) {
            $produk->stok -= $item->jumlah;

            // Pastikan stok tidak negatif
            if ($produk->stok < 0) {
                $produk->stok = 0;
            }
            $produk->update();
        }
        // Hapus detail pembelian
        $item->delete();
    }

    // Hapus pembelian
    $pembelian->delete();

    // Redirect setelah berhasil
    return redirect()->route('pembelian.index')->with('success', 'Pembelian dan detailnya berhasil dihapus.');
}

}
