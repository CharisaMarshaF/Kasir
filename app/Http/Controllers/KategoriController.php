<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index');
    }
    public function data() {
        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();
    
        return datatables()
            ->of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(\'' . route('kategori.update', $kategori->id_kategori) . '\')" class="btn btn-primary my-4">Edit</button>
                    <button onclick="deleteData(\'' . route('kategori.destroy', $kategori->id_kategori) . '\')" class="btn btn-danger my-4">Hapus</button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
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
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $kategori = Kategori::find($id);

        return response()->json($kategori);
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
    $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete(); // Menghapus data kategori

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
