<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function view(){
        $data['produk'] = Produk::all();
        return view('clients.produk',$data);
    }
    
    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required',
            'id_toko' => 'required',
        ]);

        // kalau ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            $gambar   = $request->file('gambar');
            $filename = time() . '-' . $request->nama . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('gambar', $filename, 'public');
        } else {
            $filename = null;
        }

        Produk::create([
            'nama' => $request->nama,
            'gambar' => $filename,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now(),
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
        ]);

        return redirect()->route('member-produk')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function update(Request $request, String $id){
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_toko' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);

         if ($request->hasFile('gambar')) {
            $gambar   = $request->file('gambar');
            $filename = time() . '-' . $request->nama . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('gambar', $filename, 'public');
        } else {
            $filename = null;
        }

        $produk->nama = $request->nama;
        $produk->gambar = $filename;
        $produk->harga = $request->harga;
        $produk->stock = $request->stock;
        $produk->deskripsi = $request->deskripsi;
        $produk->tanggal_upload = now();
        $produk->id_kategori = $request->id_kategori;
        $produk->id_toko = $request->id_toko;
        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil diupdate.');
    }
    public function delete(String $id) {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with('success','Produk berhasil di hapus');
    }
    public function hapus(String $id) {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with('success','Produk berhasil di hapus');
    }
}
