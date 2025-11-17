<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['toko'] = Toko::all();
        return view('toko',$data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create-toko');
    }

    /**
     * Store a newly created resource in storage.
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
        $filename = time() . '-' . $request->judul . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('gambar', $filename, 'public');
        } else {
        $filename = null;
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'users_id' => 1, // atau Auth::id() jika sudah login
        ]);

        return redirect()->route('toko')->with('success', 'Toko berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Toko $toko)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko, $id)
    {
        //
        $data['toko'] = Toko::all();
        return view('edit-toko', $data);
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
        $toko->save();

        return redirect()->route('toko')->with('success', 'Toko berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko')->with('success', 'Toko berhasil dihapus.');
    }
}
