<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

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
}
