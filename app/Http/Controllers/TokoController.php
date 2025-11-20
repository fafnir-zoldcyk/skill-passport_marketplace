<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Menambahkan sesudah create Toko
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kontak_toko' => 'nullable|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
        $gambar   = $request->file('gambar');
        $filename = time() . '-' . $request->nama_toko . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('gambar', $filename, 'public');
        } else {
        $filename = null;
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'status' =>'active',
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'users_id' => $request->users_id, // atau Auth::id() jika sudah login
        ]);

        return redirect()->route('toko')->with('success', 'Toko berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kontak_toko' => 'nullable|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        $toko = Toko::findOrFail($id);

        // kalau ada gambar baru diupload
        if ($request->hasFile('gambar')) {
        $gambar   = $request->file('gambar');
        $filename = time() . '-' . $request->nama_toko . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('gambar', $filename, 'public');
        } else {
        $filename = null;
        }

        $toko->nama_toko = $request->nama_toko;
        $toko->deskripsi = $request->deskripsi;
        $toko->gambar = $filename;
        $toko->kontak_toko = $request->kontak_toko;
        $toko->alamat = $request->alamat;
        $toko->users_id = $request->users_id;
        $toko->save();

        return redirect()->route('toko')->with('success', 'Toko berhasil diperbarui.');
    }

    /**
     * Hapus Toko
     */
    public function destroy($id)
    {
        //
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko')->with('success', 'Toko berhasil dihapus.');
    }
    public function approve($id){
        $toko = Toko::findOrFail($id);
        $toko->status = 'active';
        $toko->save();
        return redirect()->route('toko')->with('success', 'Toko berhasil diapprove.');
    }
}
