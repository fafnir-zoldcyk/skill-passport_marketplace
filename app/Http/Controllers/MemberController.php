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
    public function addtoko(Request $request){

        // dd($request->all());
        $request->validate([
            'nama_toko' => 'required|string|max:45',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jgp,jeg,png,gif|max:2048',
            'alamat' => 'required|string'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $gambar = time(). '_'.$request->nama_toko . '_' .$foto->getClientOriginalName();
            $foto->storeAs('gambar',$gambar,'public');
        }else{
            $gambar = null;
        }

        Toko::create([
            'users_id' => Auth::id(),
            'nama_toko' => $request->nama_toko,
            'kontak_toko' => Auth::user()->kontak,
            'alamat' => $request->alamat,
            'status' => 'Pending',
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);
        return redirect()->route('member')->with('success','Toko Berhasil Di Buat');
    }
    public function edit(Request $request){
        $request->validate([
            'nama_toko' => 'required|string|max:45',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
        $toko = Toko::firstOrFail($request->id);
        $filename = $toko->gambar;


        if ($request->hasFile('logo_toko')) {
            if ($toko->gambar && file_exists(public_path('storage/logotoko/'.$toko->gambar))) {
                unlink(public_path('storage/logotoko/'.$toko->gambar));
            }

            $file = $request->file('logo_toko');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/logotoko'), $fileName);
        }
        $toko->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ]);
        return redirect()->back()->with('success','Toko Berhasil di ubah');
    }
}
