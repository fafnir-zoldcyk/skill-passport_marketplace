<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Tampilan Admin
    public function admin(){
        $data['user'] = User::all();
        $data['totaluser'] = User::count();
        $data['totaltoko'] = Toko::count();
        $data['totalproduk'] = Produk::count();
        $data['totalkate'] = Kategori::count();
        $data['totalstock'] = Produk::where('stock','>',0)->count();
        return view('admin.admin',$data);
    }
    //Tampilan Admin Produk
    public function index(){
        $data['produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.produk',$data);
    }
    //Tampilan Admin Kategori
    public function indexkate(){
        $data['kategori'] = Kategori::all();
        return view('admin.kategori',$data);
    }
    public function indextok()
    {
        //
        $data['toko'] = Toko::all();
        $data['user'] = User::all();
        return view('admin.toko',$data );
    }
}
