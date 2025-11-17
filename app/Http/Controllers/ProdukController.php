<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $data['produk'] = Produk::all();
        return view('produk',$data);
    }
    public function store(Request $request){
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_toko' => 'required|integer',
        ]);

        // kalau ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            $gambar   = $request->file('gambar');
            $filename = time() . '-' . $request->nama_produk . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('gambar', $filename, 'public');
        } else {
            $filename = null;
        }

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
        ]);

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function update(Request $request){
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_toko' => 'required|integer',
        ]);
    }
}
