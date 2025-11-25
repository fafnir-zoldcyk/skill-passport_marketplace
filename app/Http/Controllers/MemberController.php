<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //Tampilan Member
    public function member(){
        $data['user'] = User::all();
        $data['totaluser'] = User::count();
        $data['totaltoko'] = Toko::count();
        $data['totalproduk'] = Produk::count();
        $data['totalkate'] = Kategori::count();
        $data['totalstock'] = Produk::where('stock','>',0)->count();
        return view('member.member',$data);
    }
    //Tampilan Member Produk
    public function tampilan(){
        $data['produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('member.produk',$data);
    }
    // public function addtoko(){
    //     return view('member.member-create');
    // }
    public function addtoko(Request $request)
    {
        // Cek apakah user sudah memiliki toko
        if (Auth::user()->toko) {
            return redirect()->back()->with('error', 'Anda sudah memiliki toko.');
        }

        $request->validate([
            'nama_toko' => 'required|string|max:100|unique:tokos,nama_toko',
            'deskripsi' => 'required|string|max:500',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kontak_toko' => 'nullable|string|max:13',
            'alamat' => 'required|string|max:255',
        ]);

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_toko . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('image', $filename, 'public'); // Simpan di storage/app/public/image
        } else {
            return redirect()->back()->with('error', 'Gambar toko wajib diupload.')->withInput();
        }

        // Buat toko
        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'status' => 'pending', // Default status pending untuk verifikasi
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'users_id' => Auth::user()->id, // Gunakan ID user yang login
        ]);

        return redirect()->route('member')->with('success', 'Toko berhasil dibuat! Menunggu verifikasi admin.');
    }
    public function edit(Request $request,$id){
        $request->validate([
            'nama_toko' => 'required|string|max:45',
            'deskripsi' => 'required|string|max:13',
            'kontak_toko' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
        $toko = Toko::firstOrFail($id);
        $filename = $toko->gambar;


        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_toko . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('image', $filename, 'public'); // Simpan di storage/app/public/image
        } else {
            return redirect()->back()->with('error', 'Gambar toko wajib diupload.')->withInput();
        }
        $toko->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'kontak_toko' => $request->kontak_toko
        ]);
        return redirect()->back()->with('success','Toko Berhasil di ubah');
    }
}
