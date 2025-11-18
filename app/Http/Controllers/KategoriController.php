<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $data['kategori'] = Kategori::all();
        return view('admin.kategori',$data);
    }
    public function store(Request $request){
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        Kategori::create($request->all());
        return redirect()->route('kategori')->with('success','kategori berhasil di tambahkan');
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori')->with('success','kategori berhasil di update');
    }
    public function delete(String $id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('success','kategori berhasil di hapus');
    }
}

