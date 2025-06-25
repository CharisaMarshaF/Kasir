<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use Barryvdh\DomPDF\Facade;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF; 
use Picqer\Barcode\BarcodeGeneratorPNG;
use PDF;


class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('produk.index', compact('kategori'));
    }
    public function data() {
        $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->select('produk.*', 'nama_kategori')
            // ->orderBy('kode_produk', 'asc')
            ->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_produk[]" value="'. $produk->id_produk .'">
                ';
            })
            ->addColumn('kode_produk', function ($produk) {
                return '<span class="label label-success">'. $produk->kode_produk .'</span>';
            })
            ->addColumn('harga_beli', function ($produk) {
                return format_uang($produk->harga_beli);
            })
            ->addColumn('harga_jual', function ($produk) {
                return format_uang($produk->harga_jual);
            })
            ->addColumn('stok', function ($produk) {
                return format_uang($produk->stok);
            })
            ->addColumn('aksi', function ($produk) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('produk.update', $produk->id_produk) .'`)" class="btn btn-xs btn-info btn-flat">Edit</button>
                    <button type="button" onclick="deleteData(`'. route('produk.destroy', $produk->id_produk) .'`)" class="btn btn-xs btn-danger btn-flat">Hapus</button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_produk', 'select_all'])
            ->make(true);
        
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
    public function store(Request $request) {
        // Menyimpan kategori baru
        $produk = Produk::latest()->first() ?? new Produk();
        $request['kode_produk'] = 'P'. tambah_nol_didepan((int)$produk->id_produk +1, 6);

        $produk = Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'produk berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $produk = Produk::find($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
    // Memperbarui kategori yang ada
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->update();
        
        return redirect()->route('produk.index')->with('success', 'produk berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete(); // Menghapus data produk

        return redirect()->route('produk.index')->with('success', 'produk berhasil dihapus!');
    }
    public function deleteSelected(Request $request)
    {
    // Pastikan ada id_produk yang dikirim
    if ($request->has('id_produk')) {
        // Loop melalui ID produk yang terpilih dan hapus
        foreach ($request->id_produk as $id) {
            $produk = Produk::find($id);
            if ($produk) {
                $produk->delete();
            }
        }

        return response()->json(['success' => 'Produk berhasil dihapus!']);
    }

    return response()->json(['error' => 'Tidak ada data yang dipilih!'], 400);
    }

    
    public function cetakBarcode(Request $request)
{
    $dataproduk = array();

    // Ensure id_produk is an array
    $id_produk = is_array($request->id_produk) ? $request->id_produk : [$request->id_produk];

    foreach ($id_produk as $id) {
        $produk = Produk::find($id);
        if ($produk) {
            $dataproduk[] = $produk;
        }
    }

    $no  = 1;
    $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
    $pdf->setPaper('a4', 'potrait');
    return $pdf->stream('produk.pdf');
}

    


}
