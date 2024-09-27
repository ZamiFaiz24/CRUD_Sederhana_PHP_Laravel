<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function __construct()
    {
        // Membatasi akses CRUD hanya untuk user yang sudah login
        $this->middleware('auth')->except('index');
    }

    // Menampilkan semua barang di gudang (public access)
    public function index()
    {
        $gudangs = Gudang::all();
        return view('gudang.index', compact('gudangs'));
    }

    // Menampilkan form untuk menambahkan barang baru
    public function create()
    {
        return view('gudang.create');
    }

    // Menyimpan barang baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi_barang' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Jika validasi lolos, lanjutkan untuk menyimpan data
        $gudang = new Gudang();
        $gudang->nama_barang = $request->nama_barang;
        $gudang->stok = $request->stok;
        $gudang->harga = $request->harga;
        $gudang->deskripsi_barang = $request->deskripsi_barang;
    
        // Jika ada gambar yang di-upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $gudang->gambar = $imageName;
        }
    
        $gudang->save(); // Simpan data ke database
    
        return redirect()->route('gudang.index')->with('success', 'Barang berhasil ditambahkan.');
    }
    

    // Menampilkan form edit barang
    public function edit($id)
    {
        $gudang = Gudang::findOrFail($id);
        return view('gudang.edit', compact('gudang'));
    }

    // Update barang di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi_barang' => 'nullable|string',
        ]);

        $gudang = Gudang::findOrFail($id);
        $gudang->update($request->all());
        return redirect()->route('gudang.index')->with('success', 'Barang berhasil diupdate');
    }

    // Hapus barang dari database
    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();
        return redirect()->route('gudang.index')->with('success', 'Barang berhasil dihapus');
    }
}
